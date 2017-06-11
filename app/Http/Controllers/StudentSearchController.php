<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Transformers\StudentTransformer;
use App\Student;
use Illuminate\Http\Request;

class StudentSearchController extends ApiController
{

    public function index(Request $request)
    {
        $query = $request->all();
        $results = Student::search($query['query'])->get();
        return $this->respondWithCollection($results, new StudentTransformer);
    }

}
