<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    public function clientType(){
        return $this->belongsTo('App\ClientType');
    }
    
    public function gender(){
        return $this->belongsTo('App\Gender');
    }
    
    public function maritalStatus(){
        return $this->belongsTo('App\MaritalStatus');
    }
    
}
