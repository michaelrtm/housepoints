<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends ApiController
{
    public function index()
    {
        dd(Student::all());
    }
}
