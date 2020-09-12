<?php

namespace App\Http\Middleware;

use Closure;

use IlluminateSupportFacadesApp;

class DomainMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url_base_array = explode('.', parse_url($request->url(), PHP_URL_HOST));

        $url_full = $request->url();
        $url_full=str_replace("http://","",$url_full);
        $url_full=str_replace("https://","",$url_full);
        $url_array = explode('/', $url_full);


        $subdomain = $url_base_array[0];

        $languages = ['ae', 'sa'];

        

        /*
        if (in_array($subdomain, $languages)) {
            App::setLocale($subdomain);
        }
        else
            App::

            setLocale("w");   
        */  

        app()->instance('subdomain', $subdomain);
        app()->instance('url_array', $url_array);

        return $next($request);
    }
}
