<?php

use Illuminate\Database\Seeder;
use App\Models\Drink;

class DrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drink::factory()->count(50)->create();
    }
}
