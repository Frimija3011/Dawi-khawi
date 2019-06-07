<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Profil;
use App\Models\Outils\Constantes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
      private $profil;
      
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Profil $profil)
    {
            $this->profil = $profil;
            $this->middleware('guest')->except('logout');
    }
    
    
    public function logout(Request $request) {
            
            $connectd_user = Auth::user();
            
            Auth::logout();
                      
            if ($connectd_user) {
                  $son_profil = $this->profil->getByUser($connectd_user->id);                  
                  $son_profil->date_dern_dcnx = date('Y-m-d H:i:s');
                  $son_profil->statut =Constantes::PROFIL_STATUT_HORS_LIGNE;
                  $son_profil->save();
            }
            
            return redirect('/login');
    }
}
