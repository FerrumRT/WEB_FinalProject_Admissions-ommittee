<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function education_degree(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }
}
