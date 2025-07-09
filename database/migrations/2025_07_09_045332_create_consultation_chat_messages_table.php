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
        Schema::create('consultation_chat_messages', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('response_to')->nullable(); // ID de mensaje padre (si aplica)
            $table->string('owner_type'); // Consultant o Consultee
            $table->unsignedBigInteger('owner_id');
            $table->foreignId('consultation_chat_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultation_chat_messages');
    }
};
