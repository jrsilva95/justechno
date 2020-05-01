<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password', 'cpf', 'rg', '', 'org_emitter', 'birth_day', 'role_id', 'ctps', 'ctps_serie', 'pis', 'oab', 'date_admission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'date_emission', 'date_admission', 'social_name', 'address_id', "status_id", 'password', 'remember_token',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    
}
