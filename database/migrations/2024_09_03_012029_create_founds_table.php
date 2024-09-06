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
        Schema::create('founds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('location');
            $table->timestamp('found_at');
            $table->foreignId('found_by')->constrained('users', 'id');

            $table->boolean('already_taken')->default(false);
            $table->foreignId('taken_by')->nullable()->constrained('users', 'id');

            $table->timestamps();

            $table->string('image_location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founds');
    }
};
