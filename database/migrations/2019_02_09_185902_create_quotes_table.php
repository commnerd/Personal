<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Quote;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('quote');
            $table->string('source');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
        factory(Quote::class)->create([
            'quote' => "There is a computer disease that anybody who works with computers knows about.<br />
It's a very serious disease and it interferes completely with the work.<br />
The trouble with computers is that you 'play' with them!",
            'source' => 'Richard P. Feynman',
            'active' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
