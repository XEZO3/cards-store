<?php

use App\Models\payment_methods;
use App\Models\User;
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
        Schema::create('balance', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(payment_methods::class)->constrained()->onDelete('cascade');
            $table->string("name");
            $table->decimal('balance', 10, 2);
            $table->string("note");
            $table->float("price");
            $table->enum('state', ['loan', 'pending','done','rejected']);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance');
    }
};
