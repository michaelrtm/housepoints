<?php

namespace App\Http\Transformers;

use App\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{

    /**
     * Turn this object into an array
     * @return array
     **/
    public function transform(Student $student)
    {
        return [
            'id'      => (int) $student->id,
            'name'    => $student->name,
            'color'   => $student->house->color,
            'grade'   => $student->grade,
            'house_id'=> $student->house_id
        ];
    }
}
