<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('setting_group_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('key')->unique();

            $table->longText('value')->nullable();

            $table->enum('type', [
                'text',
                'textarea',
                'number',
                'email',
                'url',
                'image',
                'color',
                'boolean',
                'json'
            ])->default('text');

            $table->string('label');

            $table->text('description')->nullable();

            $table->boolean('is_public')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};