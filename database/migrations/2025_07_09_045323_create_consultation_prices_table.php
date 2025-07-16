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
        Schema::create('consultation_prices', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // fixed, per_minute, per_message, per_advice, per_session
            $table->unsignedInteger('quantity')->nullable(); // for per_minute, per_message, etc.
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('USD'); // Default currency, can be changed as needed
            $table->json('payload')->nullable();
            $table->foreignId('consulting_service_id')->constrained('consultation_services')->onDelete('cascade');
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
        Schema::dropIfExists('consultation_prices');
    }
};
