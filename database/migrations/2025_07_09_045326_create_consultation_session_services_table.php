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
        Schema::create('consultation_session_services', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // Ej: pending_payment
            $table->json('responses')->nullable(); // Intake form responses
            $table->foreignId('consultation_service_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultation_session_services');
    }
};
