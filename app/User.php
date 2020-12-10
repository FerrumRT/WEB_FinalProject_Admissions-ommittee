<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_adm_member',
        'birthdate',
        'phone_number',
        'admission_member_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function admission_member(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }


}
