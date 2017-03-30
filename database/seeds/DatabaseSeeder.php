<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\House::class,4)->create();
        factory(App\Student::class,500)->create();
        factory(App\Score::class,100)->create();
    }
}
