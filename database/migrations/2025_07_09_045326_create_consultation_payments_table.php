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
        Schema::create('consultation_payments', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->decimal('revenue', 10, 2); // Ganancia del consultor
            $table->decimal('fee', 10, 2);     // Comisión de la plataforma
            $table->decimal('amount', 10, 2);  // Total pagado
            $table->json('payload')->nullable();
            $table->foreignId('consultation_price_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultation_payments');
    }
};
