<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{
      use SoftDeletes;   
    
      protected $table = 'profils';    
      protected $dates = ['deleted_at'];
      public $timestamps = true;
    
      public function user()
      {
            return $this->hasOne('App\User');
      }
      
      public function getAll()
      { 
            return self::all();
          }          
          
      public function getByUser($id_user)
      {
            return self::where('user_id', $id_user)->first();
      }
      
}
