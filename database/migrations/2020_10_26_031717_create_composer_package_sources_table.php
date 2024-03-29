<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('composer_package_sources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('composer_package_id');
            $table->foreign('composer_package_id')->references('id')->on('composer_packages');
            $table->string('reference');
            $table->string('type');
            $table->string('url');
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
        Schema::dropIfExists('composer_package_sources');
    }
};
