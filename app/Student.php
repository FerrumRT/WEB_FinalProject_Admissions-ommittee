<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function certificates(){
        return $this->hasMany('App\Certificate', 'certificate_id', 'id');
    }

}
