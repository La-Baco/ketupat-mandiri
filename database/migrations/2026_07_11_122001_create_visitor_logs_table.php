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
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();

            $table->string('session_id')->index();

            $table->string('ip_address', 45)->nullable();

            $table->text('user_agent')->nullable();

            $table->string('browser')->nullable();

            $table->string('platform')->nullable();

            $table->enum('device_type', [
                'desktop',
                'mobile',
                'tablet',
                'bot',
                'unknown'
            ])->default('unknown');

            $table->string('referer')->nullable();

            $table->string('landing_page')->nullable();

            $table->timestamp('first_visit_at');

            $table->timestamp('last_activity_at');

            $table->timestamps();

            $table->index('last_activity_at');
            $table->index('device_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};