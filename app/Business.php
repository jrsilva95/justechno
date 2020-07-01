<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function employees(){
        return $this->hasMany('App\Employee');
    }
    
    public function address(){
        return $this->belongsTo('App\Address');
    }
    
    public function phone(){
        return $this->belongsTo('App\Phone');
    }
    
}
