<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'school_name', 'university_name', 'education_degree_id', 'student_picture_url'
    ];

    public function certificates(){
        return $this->hasMany('App\Certificate', 'certificate_id', 'id');
    }

    public function user(){
        return $this->hasOne('App\User', 'admission_member_id', 'id');
    }

    public function education_degree(){
        return $this->belongsTo('App\EducationDegree', 'education_degree_id', 'id');
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
        return $user->birthdate;
    }

    public function getPhoneNumber(){
        $user = User::find($this->user_id);
        return $user->phone_number;
    }

    public function getEduDegName(){
        return EducationDegree::find($this->education_degree_id)->name;
    }
}
