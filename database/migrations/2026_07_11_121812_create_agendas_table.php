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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();

            $table->longText('description');

            $table->string('thumbnail')->nullable();

            $table->string('location');

            $table->date('event_date');

            $table->time('start_time')->nullable();

            $table->time('end_time')->nullable();

            $table->string('contact_person')->nullable();

            $table->string('contact_phone', 20)->nullable();

            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('is_featured')->default(false);

            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('slug');
            $table->index('event_date');
            $table->index('status');
            $table->index('published_at');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};