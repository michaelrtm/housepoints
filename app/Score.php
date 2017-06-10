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

    //Todo: confirm these Carbon objects are correct for scope
    public function scopeCurrentWeek($query){        
        return $query->whereBetween('created_at', [
        	Carbon::parse('monday this week'), 
        	Carbon::now()
        ]);
    }

    public function scopeLastWeek($query){        
        return $query->whereBetween('created_at', [
        	Carbon::parse('monday last week'), 
        	Carbon::parse('friday last week')
        ]);
    }

    public function scopeCurrentYear($query){        
        return $query->whereBetween('created_at', [
        	Carbon::now()->startOfYear(),
        	Carbon::now()
        ]);
    }
}
