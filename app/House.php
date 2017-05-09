<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class House extends Model
{
    protected $appends = array('score');

    public function students(){
      return $this->hasMany(Student::class);
    }
}
