<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up()
    {
        Schema::create('vuokraus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asiakasID')->constrained('asiakas')->onDelete('cascade');
            $table->date('vuokrauspvm');
            $table->date('palautuspvm')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vuokraus');
    }
};
