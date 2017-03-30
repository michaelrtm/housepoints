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
}
