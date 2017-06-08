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
        // $response->assertJson([
        //     'score' => 12
        // ]);
        
        // TODO: This is gross - how does one test json
        // wrapped in 'data' => [{ json }]?
        $parsedData = json_decode($response->getContent());
        $yuck = $parsedData->data;

        $this->assertEquals(12, $yuck[0]->score);
    }

/** @test */
    function user_can_get_score_by_last_week()
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

        $response = $this->json('GET', '/api/calculate?scope=lastweek');
    
        $response->assertStatus(200);

        // see previous test
        $parsedData = json_decode($response->getContent());
        $yuck = $parsedData->data;
        $this->assertEquals(15, $yuck[0]->score);        
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

        // see previous test
        $parsedData = json_decode($response->getContent());
        $yuck = $parsedData->data;
        $this->assertEquals(47, $yuck[0]->score);        
    }
}