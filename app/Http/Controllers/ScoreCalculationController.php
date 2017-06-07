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

        //this is still too messy
        if(Input::get('scope') == 'year'){
            $housesWithScores = $houses->map(function($house) {
                $house->score = $house->getCurrentYearScores(); 
                return $house;
            });        
        }
        elseif(Input::get('scope') == 'last-week'){
            $housesWithScores = $houses->map(function($house) {
                $house->score = $house->getLastWeekScores();
                return $house;
            });
        }
        else {
            $housesWithScores = $houses->map(function($house) {
                $house->score = $house->getCurrentWeekScores();
                return $house;
            });
        }

        return $this->respondWithCollection($housesWithScores, new HouseWithScoresTransformer);
    }
}
