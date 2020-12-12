<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    protected $fillable = [
        'name', 'description', 'skills','outcomes','leading_position','education_degree_id', 'image_url'
    ];

    public function education_degree(){
        return $this->belongsTo('App\EducationDegree', 'education_degree_id', 'id');
    }

    public function getEduDegName(){
        return $this->education_degree->name;
    }

}
