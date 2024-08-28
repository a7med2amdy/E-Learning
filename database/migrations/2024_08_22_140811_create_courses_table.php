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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('fee')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable(); // Ensure data type matches

            // Define foreign key constraint with onDelete('cascade')
            $table->foreign('trainer_id')
                  ->references('id')
                  ->on('trainers')
                  ->onDelete('cascade');
            
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
