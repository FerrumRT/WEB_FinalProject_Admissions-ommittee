<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_text', 'read_by_reciever', 'send_date',
        'student_id', 'admission_member_id', 'chat_id'
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
}
