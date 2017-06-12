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
        $names = ['Bell', 'Hookey', 'Walling', 'Jamieson'];
        $colors = ['blue', 'yellow', 'green', 'red'];
        $hex = ['#23649c', '#fcc04e', '#406d41', '#af1c1b'];

        foreach(range(0,3) as $index) 
         {
               factory(App\House::class, 1)->create([
                   'name' => $names[$index],
                   'color' => $colors[$index],
                   'hex' => $hex[$index],
               ]);
         }
        factory(App\Student::class,500)->create();
        factory(App\Score::class,400)->create();
    }
}
