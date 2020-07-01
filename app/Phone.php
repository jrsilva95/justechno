<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function getFormatted(){
        return '('. $this->ddd .') '. $this->number;
    }
}
