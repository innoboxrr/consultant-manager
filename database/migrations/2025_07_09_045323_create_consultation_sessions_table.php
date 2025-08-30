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
        Schema::create('consultation_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // open, close
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->json('payload')->nullable();
            $table->foreignId('consultee_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::dropIfExists('consultation_intake_forms');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_sessions');
    }
};
