<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tblpolitico', function (Blueprint $table) {
            $table->bigIncrements('idpolitico');
            $table->string('nomepolitico', 30);
            $table->string('cargopolitico', 30);
            $table->unsignedBigInteger('idpartidofk');
            $table->timestamps();
            $table->foreign('idpartidofk')->references('idpartido')->on('tblpartido')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
