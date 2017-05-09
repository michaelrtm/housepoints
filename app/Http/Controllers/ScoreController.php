<?php

namespace App\Http\Controllers;

use App\Score;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Transformers\ScoreTransformer;
use Illuminate\Support\Facades\Input;

class ScoreController extends ApiController
{
    public function index()
    {
        return $this->respondWithCollection(Score::all(), new ScoreTransformer);
    }

    public function show(Score $score)
    {
        return $this->respondWithItem($score, new ScoreTransformer);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'house_id' => 'required|numeric',
        //     'score' => 'required|numeric',
        // ]);

        $score = new Score();
        $score->house_id = $request->house_id;
        $score->score = $request->score;
        $score->save();

        return $this->respondWithItem($score, new ScoreTransformer);
    }
}
