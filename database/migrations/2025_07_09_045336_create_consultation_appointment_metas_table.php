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
        Schema::create('consultation_appointment_metas', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->foreignId('consultation_appointment_id')
                ->constrained('consultation_appointments', 'id', 'fk_ca_metas')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['key', 'consultation_appointment_id'], 'unique_key_consultation_appointment_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultation_appointment_metas', function (Blueprint $table) {
            $table->dropUnique('unique_key_consultation_appointment_id');
        });
        
        Schema::dropIfExists('consultation_appointment_metas');
    }
};
