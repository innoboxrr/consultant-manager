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
        Schema::create('consultation_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating'); // 1–5, por ejemplo
            $table->text('comment')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('consultation_evaluations');
    }
};
