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
        Schema::create('consultant_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week'); // Ej: Monday, Tuesday...
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('max_sessions');
            $table->foreignId('consultant_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultant_availabilities');
    }
};
