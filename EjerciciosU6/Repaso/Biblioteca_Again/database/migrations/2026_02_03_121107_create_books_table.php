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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("isbn")->unique()->nullable();

            $table->foreignId("author_id")
            ->constrained("authors")
            ->cascadeOnDelete();

            $table->date("published_at")->nullable();
            $table->unsignedInteger("pages")->nullable();
            $table->decimal("price",8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
