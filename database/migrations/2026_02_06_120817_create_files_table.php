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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('theme_id')
                ->constrained('themes');

            $table->foreignId('subtheme_id')
                ->constrained('subthemes');

            $table->foreignId('scope_id')
                ->constrained('scopes');

            $table->foreignId('user_id')
                ->constrained('users');

            $table->date('reopening_date');
            $table->date('closing_date');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
