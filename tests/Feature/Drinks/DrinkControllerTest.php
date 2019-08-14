<?php

namespace Tests\Feature\Drinks;

use App\Models\Drink;
use Tests\TestCase;
use Auth;

class DrinksControllerTest extends TestCase
{
    const TEST_DRINK = [
        "name" => "Long Island"
        "recipe" => "Some recipe here"
    ]

    /**
     * Setup tests
     */
    public function setUp() {
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

         $response = $this->get('/drinks');

         $response->assertSuccessful();

         $response->assertSee(self::TEST_DRINK["name"]);

         $response->assertSee('<a class="glyphicon glyphicon-plus" href="http://localhost/drinks/create"></a>');

         $response->assertSee('<a class="glyphicon glyphicon-edit" href="http://localhost/drinks/1/edit"></a>');

         $response->assertSee('<a href="http://localhost/drinks/1">'.self::TEST_DRINK["name"].'</a>');
     }

     /**
      * Test drink create page
      *
      * @return void
      */
     public function testGetDrinkCreationPage()
     {
         $response = $this->get('/drinks/create');

         $response->assertSuccessful();

         $response->assertSee('Create Drink');

         $response->assertSee('<input type="text" name="name"');

         $response->assertSee('<textarea name="recipe"');

         $response->assertSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test Drink Store Call
      *
      * @return void
      */
     public function testPostDrinkCreation()
     {
         $drink = new Drink(self::TEST_DRINK);

         $response = $this->post('/drinks', $drink->toArray());

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

         $response = $this->get('/drinks/'.$drink->id);

         $response->assertSuccessful();

         $response->assertSee(self::TEST_DRINK["name"]);

         $response->assertSee(self::TEST_DRINK["recipe"]);

         $response->assertDontSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test invalid drink store call
      *
      * @return void
      */
     public function testPostInvalidDrinkCreation()
     {
         $drink = new Drink();

         $response = $this->post('/drinks', $drink->toArray());

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

         $response = $this->get('/drinks/1/edit');

         $response->assertSuccessful();

         $response->assertSee('Edit ' . self::TEST_DRINK["name"]);

         $response->assertSee('<input type="text" name="name"');

         $response->assertSee('<textarea name="recipe"');

         $response->assertSee('<input class="btn btn-default" type="submit" />');
     }

     /**
      * Test updating a Drink
      *
      * @return void
      */
     public function testPutRestaurantUpdate()
     {
         Drink::create(self::TEST_DRINK);

         $response = $this->put('/drinks/1', ['name' => 'Moscow Mule']);

         $this->assertEquals('Moscow Mule', Drink::findOrFail(1)->name);
     }

     public function testDeleteDrink()
     {
         Restaurant::create(self::TEST_DRINK);

         $response = $this->delete('/drinks/1');

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

         $response = $this->get('/drinks');

         $response->assertRedirect(route('login'));
     }
}
