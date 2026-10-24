<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('code_analyses', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->text('code')->nullable();
            $table->string('language')->nullable();
            $table->text('review')->nullable();
            $table->text('improvements')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('code_analyses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn([
                'code',
                'language',
                'review',
                'improvements',
                'rating',
            ]);
        });
    }
};
