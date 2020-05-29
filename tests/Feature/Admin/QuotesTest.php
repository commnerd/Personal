<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Quote;
use Tests\TestCase;
use Auth;

class QuotesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Default test record values
     *
     * @var array
     */
    const TEST_RECORD_ARRAY = [
        'source' => 'Test Source',
        'quote' => 'Test Quote',
        'active' => 1,
    ];

    /**
     * Setup for admin access
     */
    protected function setUp(): void
    {
        parent::setUp();

        Auth::loginUsingId(1);
    }

    /**
     * A test for the quote creation page
     *
     * @return void
     */
    public function testQuoteCreationPage()
    {
        $response = $this->get(route('admin.manage.quotes.create'));
        $response->assertSuccessful();

        $response->assertSee('Create Quote');
        $response->assertSee('<input type="text" name="source" value="" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="quote"></div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for quote creation
     *
     * @return void
     */
    public function testQuoteCreation()
    {
        $response = $this->post(route('admin.manage.quotes.store'), self::TEST_RECORD_ARRAY);
        $response->assertRedirect(route('admin.manage.quotes.index'));

        $record = Quote::where('source', 'Test Source')->firstOrFail();
        $this->assertEquals($record->quote, 'Test Quote');
    }

    /**
     * A test for the quote deletion
     *
     * @return void
     */
    public function testQuoteDeletion()
    {
        $record = Quote::create(self::TEST_RECORD_ARRAY);
        $response = $this->delete(route('admin.manage.quotes.destroy', $record));

        $quote = Quote::where('id', $record->id)->first();

        $response->assertRedirect(route('admin.manage.quotes.index'));
        $this->assertEmpty($quote);
    }

    /**
     * A test for the quote edit page
     *
     * @return void
     */
    public function testQuoteEditPage()
    {
        $quote = Quote::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.quotes.edit', ['quote' => $quote]));

        $response->assertSee('Edit Quote');
        $response->assertSee('<input type="text" name="source" value="Test Source" class="form-control">', false);
        $response->assertSee('<div class="quill-editor form-control" data-name="quote">Test Quote</div>', false);
        $response->assertSee(view('shared.form.submit'));
    }

    /**
     * A test for the quote update page
     *
     * @return void
     */
    public function testQuoteUpdate()
    {
        $quote = Quote::create(self::TEST_RECORD_ARRAY);

        $response = $this->put(route('admin.manage.quotes.update', [$quote->id]), [
            'source' => 'Test Source change',
            'quote' => 'Test Quote change',
            'active' => 0,
        ], ['HTTP_REFERER' => route('admin.manage.quotes.index')]);

        $response->assertRedirect(route('admin.manage.quotes.index'));

        $quote = Quote::findOrFail($quote->id);

        $this->assertEquals($quote->source, 'Test Source change');
        $this->assertEquals($quote->quote, 'Test Quote change');
        $this->assertEquals($quote->active, 0);
    }

    /**
     * A test for the quote index page
     *
     * @return void
     */
    public function testQuoteIndexPage()
    {
        Quote::truncate();
        $response = $this->get(route('admin.manage.quotes.index'));
        $response->assertSuccessful();
        $response->assertSee('No Quotes');

        $quote = Quote::create(self::TEST_RECORD_ARRAY);
        $response = $this->get(route('admin.manage.quotes.index'));
        $response->assertSuccessful();
        $response->assertSee($quote->source);
        $response->assertSee($quote->quote);
    }
}
