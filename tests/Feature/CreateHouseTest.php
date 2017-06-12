<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateHouseTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_create_house()
    {
        //$this->disableExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')->json('post', '/api/houses', [
            'name' => 'Elrond',
            'color' => 'red',
            'blurb' => 'The house of Elrond is in Rivendell',
            'hex' => '#ccc123',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('houses', [
            'name' => 'Elrond',
            'color' => 'red',
            'blurb' => 'The house of Elrond is in Rivendell',
            'hex' => '#ccc123',
        ]);
    }

    /** @test */
    function only_a_registered_user_can_add_a_house()
    {
        $response = $this->json('post', '/api/houses', [
            'name' => 'Whiterun',
            'color' => 'white',
            'blurb' => 'The house of Whiterun is opposed to the Stormcloaks.',
            'hex' => '#ffffff',
        ]);

        //$response->assertStatus(401); //getting 500 ??
        $this->assertDatabaseMissing('houses', [
            'name' => 'Whiterun',
            'color' => 'white',
            'blurb' => 'The house of Whiterun is opposed to the Stormcloaks.',
            'hex' => '#ffffff',
        ]);
    }
}
