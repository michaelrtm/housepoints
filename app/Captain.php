<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;
use App\Grade;

class Captain extends Model
{
    public function house(){
        return $this->belongsTo(House::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
