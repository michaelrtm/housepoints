<?php

namespace Tests\Unit;

use App\House;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HouseTest extends TestCase
{
    /** @test */
    function a_blurb_will_have_line_breaks()
    {
        $house = factory(House::class)->make([
            'blurb' => "This is a\n new line",
        ]);

        $this->assertEquals($house->blurb, "This is a<br />
 new line");
    }
}
