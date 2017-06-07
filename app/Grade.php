<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Grade extends Model
{
    public function student()
    {
      return $this->hasMany(Student::class);
    }

}
