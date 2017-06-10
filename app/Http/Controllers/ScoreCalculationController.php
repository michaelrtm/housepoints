<?php

namespace App\Http\Controllers;

use App\House;
use App\Score;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Transformers\HouseWithScoresTransformer;
use Illuminate\Support\Facades\Input;

class ScoreCalculationController extends ApiController
{
    public function index()
    {
        $houses = House::all();

        $housesWithScores = $houses->map(function($house) {
            if(Input::get('scope') == 'year'){
                $house->score = $house->getCurrentYearScores(); 
                return $house;
            }    
            elseif(Input::get('scope') == 'last-week'){
                $house->score = $house->getLastWeekScores();
                return $house;
            }
            else {
                $house->score = $house->getCurrentWeekScores();
                return $house;
            }
        });
        return $this->respondWithCollection($housesWithScores, new HouseWithScoresTransformer);
    }
}
