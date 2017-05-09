<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Transformers\StudentTransformer;

class StudentController extends ApiController
{
    public function index()
    {
        return $this->respondWithCollection(Student::all(), new StudentTransformer);
    }
}
