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
        Schema::create('consultant_metas', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->foreignId('consultant_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['key', 'consultant_id'], 'unique_key_consultant_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultant_metas', function (Blueprint $table) {
            $table->dropUnique('unique_key_consultant_id');
        });
        
        Schema::dropIfExists('consultant_metas');
    }
};
