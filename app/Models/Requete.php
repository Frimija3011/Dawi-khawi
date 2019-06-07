<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class Requete extends Model
{
    use SoftDeletes;   
    
    /**
    * La table utilisée par le modèle
    *
    * @var string
    */
    protected $table = 'requetes';
    
    protected $dates = ['deleted_at'];

    /**
     * On utilise les dates de mise à jour
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * Un room a UN SEUL utilisateur créateur
     * 
     * @return type
     */
    public function user()
    {
          return $this->hasOne('App\User');
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
    
    public function getLastOne($id_user)
    {          
          $last_one = Requete::select(DB::raw('max(created_at) as max_created_at'))
                  ->where('user_id', $id_user)
                  ->groupBy('user_id')
                  ->first();
          return $last_one;            
    }
    
    /**
     * 
     * @param type $id
     * @param type $champs
     */
    public function modifier($id, $champs = [])
    {
          $room = self::where('id', $id)->get();
          
          foreach ($champs as $key => $value) {
                $room->$key = $value;
          }
          
          $room->save();
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
     * @param type $id_user
     * @return type
     */
    public function getAll($id_user = null)
    { 
        if ($id_user) {
            return self::where('user_id', $id_user)->orderBy('created_at', 'desc')->get();            
        }
        
        return self::where('id', '>', 0)->orderBy('created_at', 'desc')->get();
    }
    
}
