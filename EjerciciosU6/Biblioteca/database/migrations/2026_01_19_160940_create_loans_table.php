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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreingId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();

            $table->foreignId('book_id')
            ->constrained('books')
            ->restrictOnDelete();

            $table->date("loaned_at");
            $table->date("due_at");

            $table->date("returned_at")->nullable();

            $table->string('status')->default('open');
            $table->unique(['book_id','returned_at'], 'loans_book_open_unique');
            $table->index(['user_id','status']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
