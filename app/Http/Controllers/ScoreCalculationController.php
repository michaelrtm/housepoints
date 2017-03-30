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
        $startScope = Carbon::now()->startOfWeek();
        $endScope = Carbon::now();

        $houses = House::all();
        $since = Input::get('since');

        if($since == 'year'){
            $startScope = Carbon::now()->startOfYear();
            $endScope = Carbon::now();
        }

        $housesWithScores = $houses->map(function ($house) use ($startScope, $endScope) {
            $score = Score::where('house_id', '=', $house->id)
                ->whereBetween('created_at', [$startScope, $endScope])
                ->sum('score');

            $house->score = $score;
            return $house;
        });

        return $this->respondWithCollection($housesWithScores, new HouseWithScoresTransformer);
    }
}
