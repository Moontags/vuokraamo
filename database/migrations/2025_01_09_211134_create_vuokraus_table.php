<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVuokrausTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vuokraus', function (Blueprint $table) {
            $table->id(); // 'id' toimii pääavaimena
            $table->unsignedBigInteger('asiakasID'); // Viittaus asiakas-tauluun
            $table->date('vuokrauspvm');
            $table->date('palautuspvm')->nullable(); // Palautuspäivä voi olla NULL
            $table->timestamps(); // Luo 'created_at' ja 'updated_at' kentät

            // Aseta viiteavain asiakas-tauluun
            $table->foreign('asiakasID')->references('id')->on('asiakas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuokraus');
    }
}
