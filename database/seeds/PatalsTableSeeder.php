<?php

use App\Patal;
use Illuminate\Database\Seeder;

class PatalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patal::class, 50)->create();
    }
}
