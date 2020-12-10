<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDegree extends Model
{
    protected $fillable = [
        'name'
    ];

    public function faculties(){
        return $this->hasMany('App\Faculty', 'education_degree_id', 'id');
    }
}
