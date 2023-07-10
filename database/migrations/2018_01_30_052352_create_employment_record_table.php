<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employer');
            $table->string('position');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('bullets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_records');
    }
};
