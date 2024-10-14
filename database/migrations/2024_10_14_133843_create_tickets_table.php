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
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            
            $table->id();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->string('customer_name', 100)->nullable(false);
            $table->string('seat_number', 5)->nullable(false);
            $table->boolean('is_checked_in')->default(0);
            $table->date('check_in_time')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};