<?php

namespace Tests\Feature\Admin;

use App\Models\Drink;
use Tests\TestCase;
use Auth;

class DrinksControllerTest extends TestCase
{
    const TEST_DRINK = [
        "name" => "Long Island",
        "recipe" => "Some recipe here",
    ];

    /**
     * Setup tests
     */
    public function setUp(): void {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * Test drinks index page
     *
     * @return void
     */
     public function testGetDrinksIndexPage()
     {
         Drink::create(self::TEST_DRINK);

         $response = $this->get(route("admin.drinks.index"));

         $response->assertSuccessful();

         $response->assertSee(self::TEST_DRINK["name"]);

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="'.route("admin.drinks.create").'"></a>', false);

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="'.route("admin.drinks.edit", 1).'"></a>', false);

         $response->assertSee('<a href="'.route("admin.drinks.show", 1).'">'.self::TEST_DRINK["name"].'</a>', false);
     }

     /**
      * Test drink create page
      *
      * @return void
      */
     public function testGetDrinkCreationPage()
     {
         $response = $this->get(route("admin.drinks.create"));

         $response->assertSuccessful();

         $response->assertSee('Create Drink');

         $response->assertSee('<input type="text" name="name"', false);

         $response->assertSee('<div class="quill-editor form-control" data-name="recipe"></div>', false);

         $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test Drink Store Call
      *
      * @return void
      */
     public function testPostDrinkCreation()
     {
         $drink = new Drink(self::TEST_DRINK);

         $response = $this->post(route("admin.drinks.store"), $drink->toArray());

         $response->assertStatus(302);

         $this->assertEquals(1, Drink::count());
     }

     /**
      * Test drink show page
      *
      * @return void
      */
     public function testGetDrinkShowPage()
     {
         $drink = Drink::create(self::TEST_DRINK);

         $response = $this->get(route("admin.drinks.show", $drink));

         $response->assertSuccessful();

         $response->assertSee(self::TEST_DRINK["name"]);

         $response->assertSee(self::TEST_DRINK["recipe"]);

         $response->assertDontSee(view('shared.form.submit'));
     }

     /**
      * Test invalid drink store call
      *
      * @return void
      */
     public function testPostInvalidDrinkCreation()
     {
         $response = $this->post(route("admin.drinks.store", ["name" => "blah"]));

         $response->assertStatus(302);

         $this->assertEquals(0, Drink::count());
     }

     /**
      * Test get drink update page
      *
      * @return void
      */
     public function testGetDrinkEditPage()
     {
         $drink = Drink::create(self::TEST_DRINK);

         $response = $this->get(route("admin.drinks.edit", $drink));

         $response->assertSuccessful();

         $response->assertSee('Edit Drink (' . self::TEST_DRINK["name"] . ')');

         $response->assertSee('<input type="text" name="name"', false);

         $response->assertSee('<div class="quill-editor form-control" data-name="recipe">Some recipe here</div>', false);

         $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test updating a Drink
      *
      * @return void
      */
     public function testPutDrinkUpdate()
     {
         $drink = Drink::create(self::TEST_DRINK);

         $response = $this->put(route("admin.drinks.update", $drink), ['name' => 'Moscow Mule', 'recipe' => 'something']);

         $this->assertEquals('Moscow Mule', Drink::findOrFail($drink->id)->name);
     }

     public function testDeleteDrink()
     {
         $drink = Drink::create(self::TEST_DRINK);

         $response = $this->delete(route("admin.drinks.destroy", $drink));

         $response->assertStatus(302);

         $this->assertEquals(0, Drink::count());
     }

     /**
      * Test redirect when logged out
      *
      * @return null
      */
     public function testRedirectWhenLoggedOut()
     {
         Auth::logout();

         $response = $this->get(route("admin.drinks.index"));

         $response->assertRedirect(route('login'));
     }
}
