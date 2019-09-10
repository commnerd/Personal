<?php

namespace Tests\Feature;

use App\Models\Work\EmploymentRecord;
use Tests\TestCase;
use App\Models\Quote;
use Auth;

class PageControllerTest extends TestCase
{
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
     * Test empty quote homepage
     *
     * @return void
     */
    public function testQuotelessHomePage()
    {
        Quote::query()->truncate();
        
        $response = $this->get(route('home'));

        $response->assertSuccessful();

        $response->assertDontSee('Quote');
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
        $response->assertSee('Resume');
    }

    /**
     * Home page tests with quote
     *
     * @return void
     */
    public function testHomePageWithQuote()
    {
        Quote::create([
            'source' => 'test',
            'quote' => 'This is a test',
        ]);

        $response = $this->get(route('home'));

        $response->assertSuccessful();
        $response->assertSee('Quotes');
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

    /**
     * Test basic quotes page functionality
     *
     * @return void
     */
    public function testQuotesPage()
    {
        $response = $this->get(route('quotes'));

        $response->assertSuccessful();
    }
}
