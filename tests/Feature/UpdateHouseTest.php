<?php

namespace Tests\Feature;

use App\House;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UpdateHouseTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_update_a_house()
    {
        $this->disableExceptionHandling();

        $user = factory(User::class)->create();
        $house = House::create([
            'name' => 'Whiterun',
            'color' => 'white',
            'blurb' => 'The house of Whiterun is opposed to the Stormcloaks.',
            'hex' => '#ffffff',
        ]);

        $response = $this->actingAs($user, 'api')->put('/api/houses/' . $house->id, [
            'name' => 'Elrond',
            'color' => 'red',
            'blurb' => 'The house of Elrond is in Rivendell',
            'hex' => '#ccc123',
        ]);

        $response->assertStatus(204);
        $this->assertDatabaseHas('houses', [
            'name' => 'Elrond',
            'color' => 'red',
            'blurb' => 'The house of Elrond is in Rivendell',
            'hex' => '#ccc123',
        ]);

        $this->assertDatabaseMissing('houses', [
            'name' => 'Whiterun',
            'color' => 'white',
            'blurb' => 'The house of Whiterun is opposed to the Stormcloaks.',
            'hex' => '#ffffff',
        ]);
    }

    /** @test */
    function user_can_update_a_single_field_of_house()
    {
        $user = factory(User::class)->create();
        $house = factory(House::class)->create();

        $response = $this->actingAs($user, 'api')->put('/api/houses/' . $house->id, [
            'name' => 'Elrond',
        ]);

        $response->assertStatus(204);
        $this->assertDatabaseHas('houses', [
            'name' => 'Elrond',
        ]);
    }
}
