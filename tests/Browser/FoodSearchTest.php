<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\FoodSearch;
use Laravel\Dusk\Browser;
use App\Models\Food\Restaurant;
use Tests\DuskTestCase;

class FoodSearchTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A food search load test.
     *
     * @return void
     */
    public function testLoadFoodSearchPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1);

            $restaurant = Restaurant::create([
                'name' => 'Test Restaurant 1',
            ]);

            $browser->visit(new FoodSearch);
            $browser->type('term', 'test');
            $browser->waitFor('.ui-menu-item');
            $browser->assertVisible('.ui-helper-hidden-accessible');
            $browser->assertSee('Test Restaurant 1');
            $browser->assertDontSee('Test Restaurant 2');

            $restaurant = Restaurant::create([
                'name' => 'Test Restaurant 2',
            ]);

            $browser->visit(new FoodSearch);
            $browser->type('term', 'test');
            $browser->waitFor('.ui-menu-item');
            $browser->assertVisible('.ui-helper-hidden-accessible');
            $browser->assertSee('Test Restaurant 1');
            $browser->assertSee('Test Restaurant 2');
        });
    }
}
