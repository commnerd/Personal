<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Work\EmploymentRecord;
use Tests\TestCase;
use Auth;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Home page tests
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get(route('home'));

        $response->assertSuccessful();

        $response->assertSee('<a class="navbar-brand" href="'.route('home').'"><img height="100%" alt="Michael J. Miller" src="/storage/michael-j-miller-logo.png"></a>');
        $response->assertSee('Family');
        $response->assertSee('Quote');
        $response->assertSee('Social');
        $response->assertSee('Contact');
        $response->assertDontSee('Resume');
        $response->assertDontSee('Portfolio');
    }

    /**
     * Home page tests with resume
     *
     * @return void
     */
    public function testHomePageWithResume()
    {
        EmploymentRecord::create([
            'employer' => 'Test employer',
            'location' => 'Test location',
            'position' => 'Test position',
            'start_date' => 'Aug 2015',
            'end_date' => 'Dec 2015',
            'bullets' => 'Test work experience',
        ]);

        $response = $this->get(route('home'));

        $response->assertSuccessful();

        $response->assertSee('<a class="navbar-brand" href="'.route('home').'"><img height="100%" alt="Michael J. Miller" src="/storage/michael-j-miller-logo.png"></a>');
        $response->assertSee('Family');
        $response->assertSee('Quote');
        $response->assertSee('Social');
        $response->assertSee('Contact');
        $response->assertSee('Resume');
        $response->assertDontSee('Portfolio');
    }

    /**
     * Home page tests
     *
     * @return void
     */
    public function testHomePageWhileLoggedIn()
    {
        Auth::loginUsingId(1);
        
        $response = $this->get(route('home'));

        $response->assertSuccessful();

        $response->assertSee('<a class="navbar-brand" href="'.route('home').'"><img height="100%" alt="Michael J. Miller" src="/storage/michael-j-miller-logo.png"></a>');
        $response->assertSee('Family');
        $response->assertSee('Quote');
        $response->assertSee('Social');
        $response->assertSee('Contact');
        $response->assertDontSee('Resume');
        $response->assertDontSee('Portfolio');
    }

    /**
     * Test basic homepage functionality
     *
     * @return void
     */
    public function testResumePage()
    {
        $response = $this->get(route('resume'));

        $response->assertSuccessful();
    }
}
