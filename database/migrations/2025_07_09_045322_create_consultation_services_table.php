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
        Schema::create('consultation_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('type'); // ADVICE, APPOINTMENT, CHAT
            $table->text('description')->nullable();
            $table->json('payload')->nullable();
            $table->boolean('requires_approval')->default(false);
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
        Schema::dropIfExists('consultation_services');
    }
};
