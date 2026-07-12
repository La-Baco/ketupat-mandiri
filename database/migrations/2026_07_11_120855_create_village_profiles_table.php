<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();

            $table->text('history')->nullable();

            $table->text('vision')->nullable();

            $table->text('mission')->nullable();

            $table->longText('geography')->nullable();

            $table->string('area')->nullable();

            $table->integer('population')->default(0);

            $table->integer('families')->default(0);

            $table->integer('hamlets')->default(0);

            $table->integer('rw')->default(0);

            $table->integer('rt')->default(0);

            $table->string('postal_code')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();

            $table->decimal('longitude', 10, 7)->nullable();

            $table->string('village_map')->nullable();

            $table->string('video_profile')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};