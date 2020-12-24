<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'image_url', 'short_content',
        'content', 'created_date', 'admission_member_id'
    ];

    public function education_degree(){
        return $this->belongsTo('App\AdmissionMember', 'admission_member_id', 'id');
    }
}
