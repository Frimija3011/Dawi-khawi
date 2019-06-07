<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

class MessageUser extends Model
{
    use SoftDeletes;   
    
    /**
    * La table utilisée par le modèle
    *
    * @var string
    */
    protected $table = 'messages_users';
    
    protected $dates = ['deleted_at'];
    
    /**
     * On utilise les dates de mise à jour 
     *
     * @var bool
     */
    public $timestamps = true;
    
    public function user()
    {
            return $this->belongsTo(User::class);
    }
    
    public function getMessagesByUser($user_from)
    {
          $connectd_user = Auth::user();
          
          return self::where([ ['user_from', '=', $user_from], ['user_to', '=',$connectd_user->id] ])
                    ->orWhere([ ['user_from', '=', $connectd_user->id], ['user_to', '=',$user_from] ])
                    ->take(20)
                    ->get();
    }
    
    
    public function getNbMessages($usr_from_id, $user_to_id)
    {
          $messages = DB::table('messages_users')
                  ->select(array(DB::raw('COUNT(messages_users.id) as nb_messages_users')))
//                  ->where(array(DB::raw('messages_users.user_from = '.$usr_from_id.' and messages_users.user_to = '.$user_to_id.' or messages_users.user_from = '.$user_to_id.' and messages_users.user_to = '.$usr_from_id.' ')))                  
//                  ->where(function ($query) use ($usr_from_id, $user_to_id ) {
//                        $query->where('messages_users.user_from', '=', $usr_from_id);
//                              ->orWhere('messages_users.user_to', '=', $user_to_id);
//                        $query->where('messages_users.user_from', '=', $user_to_id)
//                              ->orWhere('messages_users.user_to', '=', $usr_from_id);
//                    })
                  ->get();
          
          return $messages;
    }
    
    public function getAll()
    {
          return self::all();
    }
    
}
