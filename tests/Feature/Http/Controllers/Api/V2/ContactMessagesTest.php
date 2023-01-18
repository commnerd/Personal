<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use App\Models\ContactMessage;

class ContactMessagesTest extends TestCase
{
    const TARGET_CLASS = ContactMessage::class;
    const MODEL_SLUG = 'contact-messages';
}