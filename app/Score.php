<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function house(){
        return $this->belongsTo(House::class);
    }
}
