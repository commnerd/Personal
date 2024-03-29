<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        User::create([
            'name' => 'Michael',
            'email' => 'commnerd@gmail.com',
            'password' => 'abcdefg',
        ]);

        User::create([
            'name' => 'Jessica',
            'email' => 'waterchica@gmail.com',
            'password' => 'abcdefg',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        User::where('email', 'commnerd@gmail.com')->delete();
        User::where('email', 'waterchica@gmail.com')->delete();
    }
};
