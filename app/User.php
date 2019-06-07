<?php

namespace App;

use App\Models\MessageUser;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * 
     * @return App\Models\Message
     */
    public function messages()
    {
        return $this->hasMany(MessageUser::class);
    }
    
    /**
     * 
     * @return App\Models\Groupe
     */
    public function groupe()
    {
          return $this->hasOne('App\Models\Groupe');
    }
    
    /**
     * 
     * @return App\Models\Profil
     */
    public function profil()
    {
          return $this->hasOne('App\Models\Profil');
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getById($id)
    {
          return self::where('id', $id)->first();
    }
    
    /**
     * 
     * @param type $id
     * @param type $champs
     */
    public function modifier($id, $champs = [])
    {
          $user = self::where('id', $id)->get();
          
          foreach ($champs as $key => $value) {
                $user->$key = $value;
          }
          
          $user->save();
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function supprimer($id)
    {
          return self::where('id', $id)->delete();
    }
    
    /**
     * 
     * @return type
     */
    public function getAll($with_profil = false, $connected_user_id = null)
    { 
          if ($with_profil) {
                
                  if ($connected_user_id) {
                        $users  = User::with('profil')->where('id', '<>', $connected_user_id)->get();
                  } else {
                        $users  = User::with('profil')->get();                  
                  }
                  
                  return $users;;
          }          
          
          return self::where('id', '>', 0)->orderBy('created_at', 'desc')->get();
    }
}
