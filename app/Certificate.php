<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'certificate_url', 'name', 'student_id'
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'certificate_id', 'id');
    }
}
