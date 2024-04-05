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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('short_description');
            $table->text('description');
            $table->string('featured_photo');
            $table->string('location')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('map')->nullable();
            $table->integer('goal');
            $table->integer('raised')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
