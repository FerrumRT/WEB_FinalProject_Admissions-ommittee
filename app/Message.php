<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_text',
        'read_by_receiver',
        'send_date',
        'student_sender',
        'student_id',
        'admission_member_id',
        'chat_id'
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function admission_member(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }

    public function chat(){
        return $this->belongsTo('App\Chat', 'chat_id', 'id');
    }

    public function getAdmissionPic(){
        return !empty(AdmissionMember::find($this->admission_member_id)->image_url)?AdmissionMember::find($this->admission_member_id)->image_url: asset('img/default_user.jpg') ;
    }

    public function getStudentPic(){
        return !empty(Student::find($this->student_id)->student_picture_url)?Student::find($this->student_id)->student_picture_url: asset('img/default_user.jpg') ;
    }

    public function getAdmissionName(){
        return !empty(AdmissionMember::find($this->admission_member_id)->getName())?AdmissionMember::find($this->admission_member_id)->getName(): null ;
    }

    public function getStudentName(){
        return !empty(Student::find($this->student_id)->getName())?Student::find($this->student_id)->getName(): null ;
    }
}
