<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = [];
    
    public function house(){
        return $this->belongsTo(House::class);
    }
}
