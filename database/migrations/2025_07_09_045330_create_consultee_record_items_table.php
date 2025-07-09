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
        Schema::create('consultee_record_items', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('label');
            $table->json('data')->nullable();
            $table->boolean('required')->default(false);
            $table->foreignId('consultee_record_category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultee_record_items');
    }
};
