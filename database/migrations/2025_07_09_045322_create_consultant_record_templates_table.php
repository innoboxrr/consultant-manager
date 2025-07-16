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
        Schema::create('consultant_record_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');                     // Nombre del template
            $table->string('description')->nullable(); // Descripción opcional del template
            
            $table->json('data')->nullable();
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
        Schema::dropIfExists('consultant_record_templates');
    }
};
