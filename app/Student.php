<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;

class Student extends Model
{
    public function house(){
      return $this->belongsTo(House::class);
    }
}
