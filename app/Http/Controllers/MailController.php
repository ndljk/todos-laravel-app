<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class MailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
         $data=Http::get('https://jsonplaceholder.typicode.com/todos');

        if(App::isLocale('en')){
            $error_mess='Cannot reach data from API!';
            $email_mess='Please check your email';
        } elseif(App::isLocale('si')){
            $error_mess='Podatkov iz API ni mogoče doseči!';
            $email_mess='Preverite vašo e-pošto';
        } else {
            $error_mess='Nije moguće pokupiti podatke sa API';
            $email_mess='Provjerite Vašu e-poštu';
        }

        if($data->successful()) {
            Mail::to(session('loggedUser'))->send(new TestMail($data->json()));
            $request->session()->flash('email', $email_mess);
        } else {
            $request->session()->flash('status', $error_mess);
        }         
        return back();
    }
}
