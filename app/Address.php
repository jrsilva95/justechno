<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    public function getFormatted(){
        return getLine1() . ', ' . getLine2();
    }
    
    public function getLine1(){
        return $this->street . ', Nº ' . $this->number;
    }
    
    public function getLine2(){
        return $this->neighborhood . ', ' . $this->city->name . '/' . $this->city->state->uf;
    }
    
    public function city(){
        return $this->belongsTo('App\City');
    }
    
}
