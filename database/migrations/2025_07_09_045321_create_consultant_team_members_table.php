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
        Schema::create('consultant_team_members', function (Blueprint $table) {
            $table->id();

            $table->string('status')->default('invited'); // invited, active, suspended, etc.
            $table->string('role');                       // admin, agent, assistant, etc.
            $table->string('position_title')->nullable(); // opcional: Coordinador, Ejecutivo, etc.

            $table->json('permissions')->nullable();      // permisos personalizados (opcional)
            $table->text('notes')->nullable();            // notas internas u observaciones

            $table->foreignId('invited_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('consultant_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamp('joined_at')->nullable();   // cuándo aceptó la invitación
            $table->timestamp('removed_at')->nullable();  // cuándo fue removido (soft status)
            $table->timestamp('last_active_at')->nullable(); // última interacción real

            $table->timestamps();
            $table->softDeletes();                        // eliminaciones lógicas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultant_team_members');
    }
};
