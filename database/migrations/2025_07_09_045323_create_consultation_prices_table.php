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
            $table->string('type'); // fixed, per_minute, per_message, per_file, per_advice
            $table->decimal('amount', 10, 2);
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
