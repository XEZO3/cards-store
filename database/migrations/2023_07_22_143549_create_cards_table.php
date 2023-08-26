<?php

use App\Models\category;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->decimal('price', 10, 2);
            $table->foreignIdFor(category::class)->constrained()->onDelete('cascade');;
            $table->boolean("avilability");
            $table->boolean('require_id');
            $table->float("discount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
