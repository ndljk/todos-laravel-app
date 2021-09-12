<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    protected $supporeted_languages=['en','ba','si'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('locale')){
            session(['locale'=>$request->getPreferredLanguage($this->supporeted_languages)]);
        }

        app()->setlocale(session('locale'));
        
        return $next($request);
    }
}
