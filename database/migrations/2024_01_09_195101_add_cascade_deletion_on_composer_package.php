<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('composer_package_sources', function (Blueprint $table) {
            $table->dropForeign('composer_package_sources_composer_package_id_foreign');
            $table->foreign('composer_package_id')
                ->references('id')
                ->on('composer_packages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('composer_package_sources', function (Blueprint $table) {
            $table->dropForeign('composer_package_sources_composer_package_id_foreign');
            $table->foreign('composer_package_id')
                ->references('id')
                ->on('composer_packages');
        });
    }
};
