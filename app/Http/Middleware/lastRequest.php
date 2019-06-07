<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Requete;

class lastRequest
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
            // IP
            $ip_client = Request::getClientIp();            
            
            // Server infos
            $server = $request->server();            
            
            // Nouvelle requete
            $requete = new Requete();
            $requete->ip = $ip_client;
            $requete->host = $server['HTTP_HOST'];
            $requete->port = $server['SERVER_PORT'];
            $requete->uri = $server['REQUEST_URI'];
            $requete->method = $server['REQUEST_METHOD'];
            $requete->script = $server['SCRIPT_FILENAME'];
            
            // User
            $connectd_user = Auth::user();
            $requete->user_id = $connectd_user->id;
            
            $requete->save();
          
            return $next($request); 
    }
}
