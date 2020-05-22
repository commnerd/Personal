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
        $this->call(VoyagerDatabaseSeeder::class);
        // $this->call(VoyagerDummyDatabaseSeeder::class);
        $this->call(QuotesTableSeeder::class);
        $this->call(FoodTablesSeeder::class);
        $this->call(DrinksTableSeeder::class);
    }
}
