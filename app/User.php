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
        'is_admin',
        'birthdate',
        'phone_number',
        'admission_member_id',
        'student_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function admission_member(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }


}
