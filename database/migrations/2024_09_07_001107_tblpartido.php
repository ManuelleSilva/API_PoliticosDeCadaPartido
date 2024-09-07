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
        Schema::create('tblpartido', function (Blueprint $table) {
            $table->bigIncrements('idpartido');
            $table->string('nomepartido', 50); 
            $table->string('siglapartido', 10); 
            $table->date('dataFundacao'); 
            $table->timestamps(); 
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
