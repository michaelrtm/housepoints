<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;
use App\Grade;

class Student extends Model
{
    protected $guarded = [];
	
    public function house(){
      return $this->belongsTo(House::class);
    }

    public function grade(){
      return $this->belongsTo(Grade::class);
    }
}
