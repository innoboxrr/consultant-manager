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
        Schema::create('consultee_record_metas', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->longText('value');
            $table->foreignId('consultee_record_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['key', 'consultee_record_id'], 'unique_key_consultee_record_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultee_record_metas', function (Blueprint $table) {
            $table->dropUnique('unique_key_consultee_record_id');
        });
        
        Schema::dropIfExists('consultee_record_metas');
    }
};
