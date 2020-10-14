<?php

namespace Tests\Feature;

use App\Models\Work\EmploymentRecord;
use App\Models\ComposerRepo;
use App\Models\Quote;
use Tests\TestCase;
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

    /**
     * Test basic packages.json functionality
     *
     * @return void
     */
    public function testPackagesJson()
    {
        ComposerRepo::create([
            "type" => ComposerRepo::TYPE_VCS,
            "url" => "https://test.com",
        ]);
        $response = $this->get(route('composer_packages'));
        $response->assertSuccessful();
        $response->assertJson([
            "repositories" => [
                [
                    "type" => ComposerRepo::TYPE_VCS,
                    "url" => "https://test.com",
                ],
            ],
        ]);
    }
}
