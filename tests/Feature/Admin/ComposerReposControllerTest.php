<?php

namespace Tests\Feature\Admin;

use App\Models\ComposerRepo;
use Tests\TestCase;
use Auth;

class ComposerReposControllerTest extends TestCase
{
    const TEST_REPO = [
        "type" => ComposerRepo::TYPE_VCS,
        "url" => "https://test.com",
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
     public function testGetRepoIndexPage()
     {
        ComposerRepo::create(self::TEST_REPO);

        $response = $this->get(route("admin.manage.composer_repos.index"));

        $response->assertSuccessful();

        $response->assertSee(self::TEST_REPO["url"]);

        $response->assertSee('<a class="glyphicon glyphicon-plus" href="'.route("admin.manage.composer_repos.create").'"></a>', false);

        $response->assertSee('<a class="glyphicon glyphicon-edit" href="'.route("admin.manage.composer_repos.edit", 1).'"></a>', false);

        $response->assertSee('<a href="'.route("admin.manage.composer_repos.show", 1).'">'.self::TEST_REPO["url"].'</a>', false);
     }

     /**
      * Test repo create page
      *
      * @return void
      */
     public function testGetRepoCreationPage()
     {
         $response = $this->get(route("admin.manage.composer_repos.create"));

         $response->assertSuccessful();

         $response->assertSee('Create a Composer Repo');

         $response->assertSee('<select name="type"', false);

         $response->assertSee('<input type="text" name="url"', false);

         $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test Repo Store Call
      *
      * @return void
      */
     public function testPostRepoCreation()
     {
         $repo = new ComposerRepo(self::TEST_REPO);

         $response = $this->post(route("admin.manage.composer_repos.store"), $repo->toArray());

         $response->assertStatus(302);

         $this->assertEquals(1, ComposerRepo::count());
     }

     /**
      * Test repo show page
      *
      * @return void
      */
     public function testGetRepoShowPage()
     {
         $repo = ComposerRepo::create(self::TEST_REPO);

         $response = $this->get(route("admin.manage.composer_repos.show", $repo));

         $response->assertSuccessful();

         $response->assertSee(self::TEST_REPO["url"]);

         $response->assertDontSee(view('shared.form.submit'));
     }

     /**
      * Test invalid repo store call
      *
      * @return void
      */
     public function testPostInvalidRepoCreation()
     {
         $response = $this->post(route("admin.manage.composer_repos.store", ["url" => ""]));

         $response->assertStatus(302);

         $this->assertEquals(0, ComposerRepo::count());
     }

     /**
      * Test get drink update page
      *
      * @return void
      */
     public function testGetRepoEditPage()
     {
         $repo = ComposerRepo::create(self::TEST_REPO);

         $response = $this->get(route("admin.manage.composer_repos.edit", $repo));

         $response->assertSuccessful();

         $response->assertSee('Edit Repo (' . self::TEST_REPO["url"] . ')');

         $response->assertSee('<input type="text" name="url"', false);

         $response->assertSee('<select name="type"', false);

         $response->assertSee(view('shared.form.submit'));
     }

     /**
      * Test updating a repo
      *
      * @return void
      */
     public function testPutRepoUpdate()
     {
         $repo = ComposerRepo::create(self::TEST_REPO);

         $response = $this->put(route("admin.manage.composer_repos.update", $repo), ['type' => $repo::TYPE_VCS, 'url' => 'https://test.com']);

         $this->assertEquals("https://test.com", ComposerRepo::findOrFail($repo->id)->url);
     }

     public function testDeleteRepo()
     {
         $repo = ComposerRepo::create(self::TEST_REPO);

         $response = $this->delete(route("admin.manage.composer_repos.destroy", $repo));

         $response->assertStatus(302);

         $this->assertEquals(0, ComposerRepo::count());
     }

     /**
      * Test redirect when logged out
      *
      * @return null
      */
     public function testRedirectWhenLoggedOut()
     {
         Auth::logout();

         $response = $this->get(route("admin.manage.composer_repos.index"));

         $response->assertRedirect(route('login'));
     }
}
