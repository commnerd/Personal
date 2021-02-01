<?php

use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quote::factory()->count(50)->create();
    }
}
