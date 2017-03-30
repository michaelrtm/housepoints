<?php

namespace App\Http\Transformers;

use App\House;
use League\Fractal\TransformerAbstract;

class HouseTransformer extends TransformerAbstract
{

    /**
     * Turn this object into an array
     * @return array
     **/
    public function transform(House $house)
    {
        return [
            'id'      => (int) $house->id,
            'name'    => $house->name,
            'color'   => $house->color,
            'blurb'   => $house->blurb
        ];
    }
}
