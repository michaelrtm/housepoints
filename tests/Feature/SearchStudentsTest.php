<?php

namespace Tests\Feature;

use App\Student;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SearchStudentsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function searching_for_student_returns_proper_collection()
    {
        $this->disableExceptionHandling();

        //$students = factory(Student::class, 500)->create();
        $studentA = factory(Student::class)->create([
            'name' => 'John Smith',
        ]);
        $studentB = factory(Student::class)->create([
            'name' => 'Scotty Johnson',
        ]);
        $studentC = factory(Student::class)->create([
            'name' => 'Smeagol',
        ]);

        $response = $this->json('post', '/api/students/search', [
            'query' => 'joh',
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => "John Smith",
        ]);
        $response->assertJsonFragment([
            "name" => "Scotty Johnson",
        ]);
        $response->assertJsonMissing([
            "name" => "Smeagol",
        ]);
    }
}
