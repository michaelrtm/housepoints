<?php

namespace App\Http\Transformers;

use App\Score;
use League\Fractal\TransformerAbstract;

class ScoreTransformer extends TransformerAbstract
{

    /**
     * Turn this object into an array
     * @return array
     **/
    public function transform(Score $score)
    {
        return [
            'id'            => (int) $score->id,
            'house_id'      => (int) $score->house_id,
            'score'         => (int) $score->score,
            'reason'        => $score->reason,
            'created'       => $score->created_at,
        ];
    }
}
