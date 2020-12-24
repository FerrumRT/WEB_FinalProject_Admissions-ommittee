<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'created_date', 'latest_message_text', 'latest_message_time',
        'student_id', 'admission_member_id'
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function admission_member(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }

    public function messages(){
        return $this->hasMany('App\Message', 'chat_id', 'id');
    }
}
