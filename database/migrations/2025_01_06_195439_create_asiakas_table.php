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
        Schema::create('asiakas', function (Blueprint $table) {
            $table->id();
            $table->string('etunimi', 100);
            $table->string('sukunimi', 100);
            $table->string('sahkoposti', 255)->unique();
            $table->string('lahiosoite', 100)->nullable();
            $table->string('postinumero', 5)->nullable();
            $table->string('postitoimipaikka', 100)->nullable();
            $table->string('puhelin', 15)->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asiakas');
    }
};
