<?php

namespace Tests\Feature\Api\V1;

use App\Models\Quote;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    /**
     * Default test record values
     *
     * @var array
     */
    const TEST_RECORD_ARRAY = [
        'source' => 'Test Source',
        'quote' => 'Test Quote',
    ];

    /**
     * A basic quote listing.
     *
     * @return void
     */
    public function testQuotePagedRetrieval()
    {
        Quote::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('api.v1.quotes.index'));
        $response->assertSuccessful();

        $response->assertJson([ "data" => [1 => self::TEST_RECORD_ARRAY] ]);
    }

    /**
     * A basic quote retrieval.
     *
     * @return void
     */
    public function testQuoteShowRetrieval()
    {
        $quote = Quote::create(self::TEST_RECORD_ARRAY);

        $response = $this->get(route('api.v1.quotes.show', $quote));
        $response->assertSuccessful();

        $response->assertJson(self::TEST_RECORD_ARRAY);
    }
}
