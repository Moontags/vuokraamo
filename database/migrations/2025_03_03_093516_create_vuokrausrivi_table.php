<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vuokrausrivi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vuokrausID');
            $table->unsignedBigInteger('tuoteID');
            $table->date('alkamisaika'); // Lisää tämä
            $table->date('paattymisaika'); // Lisää tämä
            $table->integer('maara')->default(1);
            $table->decimal('hinta', 8, 2);
            $table->boolean('palautettu')->default(0);
            $table->timestamps();

            $table->foreign('vuokrausID')->references('id')->on('vuokraus')->onDelete('cascade');
            $table->foreign('tuoteID')->references('tuoteID')->on('tuote')->onDelete('cascade');
        });
    }
};
