<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Transformers\HouseTransformer;
use Illuminate\Http\Request;

class HouseController extends ApiController
{
    public function index(){
    	return $this->respondWithCollection(House::all(), new HouseTransformer);
    }

    public function store(Request $request)
    {
        House::create([
            'name' => $request->name,
            'color' => $request->color,
            'hex' => $request->hex,
            'blurb' => $request->blurb,
        ]);
        return $this->respondWithCreated();
    }

    public function update(Request $request, $id)
    {
        $house = House::find($id);

        $house->name = $request->name ?? $house->name;
        $house->color = $request->color ?? $house->color;
        $house->hex = $request->hex ?? $house->hex;
        $house->blurb = $request->blurb ?? $house->blurb;
        $house->save();

        return $this->respondWithStatus(204);
    }

    public function delete($id)
    {
        $house = House::find($id);
        $house->delete();

        return $this->respondWithDeleted();
    }
}
