<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('survey.database.tables.answers'), function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('entry_id')->nullable();
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('survey.database.tables.answers'));
    }
};
