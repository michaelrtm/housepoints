<?php

namespace Tests\Feature;

use App\House;
use App\Score;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ViewCalculatedScoresByScopeTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function user_can_get_scores_by_current_week()
    {
        $house = factory(House::class)->create();
        $house->scores()->create([
            'score' => 12,
            'created_at' => Carbon::parse('yesterday'),
        ]);
        $house->scores()->create([
            'score' => 15,
            'created_at' => Carbon::now()->subWeek(),
        ]);
        $house->scores()->create([
            'score' => 12,
            'created_at' => Carbon::parse('-3 months'),
        ]);

        $response = $this->json('GET', '/api/calculate');
        
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'score' => 12
        ]);
    }

/** @test */
    function user_can_get_score_by_last_week()
    {
        $house = factory(House::class)->create();
        $house->scores()->create([
            'score' => 12,
            'created_at' => Carbon::parse('this monday'),
        ]);
        $house->scores()->create([
            'score' => 15,
            'created_at' => Carbon::parse('last tuesday'),
        ]);
        $house->scores()->create([
            'score' => 12,
            'created_at' => Carbon::parse('-3 months'),
        ]);

        $response = $this->json('GET', '/api/calculate?scope=lastweek');
    
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'score' => 15
        ]);    
    }

    /** @test */
    function user_can_get_score_by_year()
    {
        $house = factory(House::class)->create();
        $house->scores()->create([
            'score' => 12,
            'created_at' => Carbon::parse('yesterday'),
        ]);
        $house->scores()->create([
            'score' => 15,
            'created_at' => Carbon::now()->subWeek(),
        ]);
        $house->scores()->create([
            'score' => 20,
            'created_at' => Carbon::parse('-3 months'),
        ]);

        $response = $this->json('GET', '/api/calculate?scope=year');
    
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'score' => 47
        ]);      
    }
}