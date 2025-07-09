<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // offline / online
            $table->string('status');
            $table->unsignedBigInteger('start_time')->nullable(); // UNIX timestamp
            $table->unsignedBigInteger('end_time')->nullable();   // UNIX timestamp
            $table->json('payload')->nullable();
            $table->string('room_url')->nullable();
            $table->foreignId('consultation_session_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_appointments');
    }
};
