<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('potential_tag', function (Blueprint $table) {

            $table->foreignId('potential_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('potential_tag_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['potential_id', 'potential_tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('potential_tag');
    }
};