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
        Schema::create('farmers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('extension_name')->nullable();
            $table->enum('sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('highest_formal_education')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
