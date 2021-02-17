<?php

namespace Tests\Browser\Admin\Drinks;

use Tests\Browser\Pages\Admin\Drinks\Create as CreatePage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Drink;
use App\Models\User;

class CreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDrinkCreation()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::findOrFail(1));
            $browser->visit(new CreatePage)
                ->type('@name', 'Test Drink')
                ->script('$(".quill-editor .ql-editor").html("Test Recipe");');
            $browser->click('@submit');
        });

        $drink = Drink::where('name', 'Test Drink')->firstOrFail();

        $this->browse(function (Browser $browser) use ($drink) {
            $browser->visit(route('admin.manage.drinks.show', [$drink]))
                    ->assertSee('Test Drink')
                    ->assertSee('Test Recipe');
        });
    }
}
