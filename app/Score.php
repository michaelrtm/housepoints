<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = [];
	
    public function house(){
        return $this->belongsTo(House::class);
    }

    public function scopeCurrentWeek($query){        
        return $query->whereBetween('created_at', [
        	Carbon::now()->startOfWeek(), 
        	Carbon::now()
        ]);
    }

    public function scopeLastWeek($query){        
        return $query->whereBetween('created_at', [
        	Carbon::now()->subWeek()->startOfWeek(), 
        	Carbon::now()->subWeek()->endOfWeek()
        ]);
    }

    public function scopeCurrentYear($query){        
        return $query->whereBetween('created_at', [
        	Carbon::now()->startOfYear(),
        	Carbon::now()
        ]);
    }
}
