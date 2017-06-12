<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\House;
use App\Grade;
use Laravel\Scout\Searchable;

class Student extends Model
{
    use Searchable;

    protected $guarded = [];

    public function house(){
      return $this->belongsTo(House::class);
    }

    public function grade(){
      return $this->belongsTo(Grade::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
