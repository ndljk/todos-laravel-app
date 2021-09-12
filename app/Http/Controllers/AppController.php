<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    //
    function getApiData(Request $request)
    {        
        $data=Http::get('https://jsonplaceholder.typicode.com/todos');

        if(App::isLocale('en')){
            $error_mess='Cannot reach data from API!';
        } elseif(App::isLocale('si')){
            $error_mess='Podatkov iz API ni mogoče doseči!';
        } else {
            $error_mess='Nije moguće pokupiti podatke sa API';
        }

        if($data->successful()) {
            return view('home',['data'=>$data->json()]);
        } else {
            $request->session()->flash('status', $error_mess);
            return view('home');
        }        
    }

    function login(Request $request)
    {
        $request->validate([
                'email'=>'required',
                'password'=>'required | min:6'
            ]
        );

        if(App::isLocale('en')){
            $error_mess='Wrong password or email';
        } elseif(App::isLocale('si')){
            $error_mess='Napačno geslo ali e -poštni naslov';
        } else {
            $error_mess='Pogrešna lozinka ili e-mail!';
        }
        
        $loginData= $request->input();

        $result=DB::table('users')
                ->where('email','=',$loginData['email'])
                ->where('password','=',$loginData['password'])
                ->get();

        if (!$result->isEmpty()) { 
            $request->session()->put('loggedUser', $result[0]->email);
            return back();
        } else {
            $request->session()->flash('loginError', $error_mess);
            return back();
        }
    }
}
