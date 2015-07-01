<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['name'];
      public function users()
    {
        return $this->hasMany('App\User');
    }
         public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
