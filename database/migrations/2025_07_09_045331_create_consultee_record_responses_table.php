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
        Schema::create('consultee_record_responses', function (Blueprint $table) {
            $table->id();
            $table->json('data')->nullable();
            $table->dateTime('responded_at')->nullable();
            $table->foreignId('updated_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('consultee_record_item_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultee_record_responses');
    }
};
