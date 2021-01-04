<?php

namespace Tests\Feature\Api\Middleware;

use App\Models\Quote;
use Tests\TestCase;

class StripHtmlTest extends TestCase
{
    public function testHtmlStripping()
    {
        Quote::create([
            'source' => "Some Dumb Guy",
            'quote' => "<p>All your base<br />are belong to us!</p>",
        ]);

        $response = $this->get(route('api.v1.quotes.index'));

        $this->assertEquals("All your baseare belong to us!", $response->getData()->data[1]->quote);
    }
}