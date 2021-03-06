<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEmploymentRecordDateTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment_records', function (Blueprint $table) {
            $table->string('start_date')->change();
            $table->string('end_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employment_records', function (Blueprint $table) {
            $table->date('start_date')->change();
            $table->date('end_date')->change();
        });
    }
}
