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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string("phone_number");
            $table->string("country")->nullable();
            $table->string("town")->nullable();
            $table->string("location")->nullable();
            $table->enum('permession', ['Admin', 'User']);
            $table->decimal('balance', 10, 2)->default(0);
            $table->decimal('total_balance', 12, 3)->default(0);
            $table->integer('rank')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
