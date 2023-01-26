<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Quote;

class SluggableModelTest extends TestCase
{
    /**
     * Testing Quote model slug.
     *
     * @return void
     */
    public function test_quote_model_slugs()
    {
        $this->assertEquals('quote', Quote::slug());
        $this->assertEquals('quotes', Quote::slug(true));
    }
}
