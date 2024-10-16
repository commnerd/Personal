<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Food\Restaurant::factory(30)->create()->each(function($restaurant) {
            \App\Models\Food\Order::factory(30)->create(['restaurant_id' => $restaurant->id]);
        });
        \App\Models\Drink::factory(30)->create();
        \App\Models\Composer\Package::factory(30)->create()->each(function($package) {
            \App\Models\Composer\PackageSource::factory(30)->create(['composer_package_id' => $package->id]);
        });
        \App\Models\Quote::factory(30)->create();
        \App\Models\ContactMessage::factory(30)->create();
        \App\Models\DailyReminder::factory(30)->create();
        \App\Models\EmploymentRecord::factory(30)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
