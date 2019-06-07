<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Outils\Constantes;

use App\Models\Profil;

class SessionTimeout
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
        $timeout = config('session.lifetime');
        if (Session::has('lastActivityTime') && (time() - Session::get('lastActivityTime')) > $timeout) {
   
            // User
            $connectd_user = Auth::user();
            $user_id = $connectd_user->id;
            
            // Update profil status
            $profil = new Profil();
            $user_profil = $profil->getByUser($user_id);
            $user_profil->statut = Constantes::PROFIL_STATUT_HORS_LIGNE;
            $user_profil->date_dern_dcnx = date('Y-m-d H:i:s');
            $user_profil->save();
              
            Session::flush(); // removes all session data            
            Auth::logout();
            
            return redirect('/login');
        } 
        
        Session::put('lastActivityTime', time());
        return $next($request);
    }
}
