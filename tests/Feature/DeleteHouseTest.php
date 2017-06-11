<?php

namespace Tests\Feature;

use App\House;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DeleteHouseTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_delete_a_house()
    {
        $this->disableExceptionHandling();

        $user = factory(User::class)->create();
        $house = factory(House::class)->create(['name' => 'Hogwarts']);

        $response = $this->actingAs($user, 'api')->delete('/api/houses/' . $house->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('houses', ['name' => 'Hogwarts']);
    }
}
