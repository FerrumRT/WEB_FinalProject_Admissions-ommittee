<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionMember extends Model
{
    protected $fillable = [
        'user_id', 'image_url'
    ];

    public function faculties(){
        return $this->hasMany('App\News', 'admission_member_id', 'id');
    }

    public function user(){
        return $this->hasOne('App\User', 'admission_member_id', 'id');
    }

    public function getName(){
        $user = User::find($this->user_id);
        return $user->name;
    }

    public function getEmail(){
        $user = User::find($this->user_id);
        return $user->email;
    }

    public function getPassword(){
        $user = User::find($this->user_id);
        return $user->password;
    }

    public function getBirthdate(){
        $user = User::find($this->user_id);
        return !empty($user->birthdate)?$user->birthdate:null;
    }

    public function getPhoneNumber(){
        $user = User::find($this->user_id);
        return !empty($user->phone_number)?$user->phone_number:null;
    }

}
