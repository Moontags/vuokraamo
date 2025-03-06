<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('myyja', function (Blueprint $table) {
        $table->id('myyjaID');
        $table->string('nimi');
        $table->string('kayttajatunnus')->unique();
        $table->string('salasana');
        $table->string('rooli');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myyja');
    }
};
