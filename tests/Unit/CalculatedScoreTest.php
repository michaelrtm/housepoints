<?php

namespace Tests\Feature;

use App\House;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CalculatedScoreTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
    	parent::setUp();
    	$this->house = factory(House::class)->create();
    }

    private function add_score($score, $date){
    	$this->house->scores()->create([
    		'score' => $score,
    		'created_at' => $date,
    	]);
    }

    /** @test */
    function view_calculated_scores_for_a_house_for_current_week()
    {
        $this->add_score(12, Carbon::parse('yesterday'));
        $this->add_score(15, Carbon::parse('wednesday last week'));
        $this->add_score(10, Carbon::parse('-5 months'));

        $this->assertEquals(12, $this->house->getCurrentWeekScores());
    }

    /** @test */
    function view_calculated_scores_for_a_house_for_previous_week()
    {
        $this->add_score(12, Carbon::parse('yesterday'));
        $this->add_score(15, Carbon::parse('wednesday last week'));
        $this->add_score(10, Carbon::parse('-5 months'));

        $this->assertEquals(15, $this->house->getLastWeekScores());
    }

    /** @test */
    function view_calculated_scores_for_a_house_for_current_year()
    {
        $this->add_score(12, Carbon::parse('yesterday'));
        $this->add_score(15, Carbon::parse('wednesday last week'));
        $this->add_score(10, Carbon::parse('-5 months'));

        $this->assertEquals(37, $this->house->getCurrentYearScores());
    }
}