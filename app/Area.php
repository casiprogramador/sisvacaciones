<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function workers(){
        return $this->hasMany('App\Worker');
    }
}
