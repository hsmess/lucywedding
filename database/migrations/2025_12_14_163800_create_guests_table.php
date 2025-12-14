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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('has_plus_one')->default(false);
            $table->integer('plus_one_id')->nullable();
            $table->foreignId('invitation_id')->nullable()->constrained();
            $table->boolean('attending')->default(false);
            $table->text('dietary_requirements')->nullable();
            $table->text('song_request')->nullable();
            $table->text('other_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
