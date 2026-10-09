<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('code_analyses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('code');
            $table->string('language');
            $table->text('review');
            $table->text('improvements');
            $table->decimal('rating', 3, 1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('code_analyses');
    }
};