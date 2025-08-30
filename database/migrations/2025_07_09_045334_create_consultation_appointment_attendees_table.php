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
        Schema::create('consultation_appointment_attendees', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type'); // Consultant | Consultee
            $table->unsignedBigInteger('owner_id');
            $table->foreignId('consultation_appointment_id')
                ->constrained('consultation_appointments', 'id', 'fk_consultation_appointment')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['owner_type', 'owner_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_appointment_attendees');
    }
};
