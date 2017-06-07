<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Captain;

class House extends Model
{
    protected $guarded = [];
    protected $appends = array('score');

    public function students(){
      return $this->hasMany(Student::class);
    }

    public function captains(){
        return $this->hasMany(Captain::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }
}
