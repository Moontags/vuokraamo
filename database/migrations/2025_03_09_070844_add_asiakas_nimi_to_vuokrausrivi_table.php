<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vuokrausrivi', function (Blueprint $table) {
            $table->string('asiakas_nimi')->after('vuokrausID'); // Lisää asiakkaan nimi
        });
    }

    public function down()
    {
        Schema::table('vuokrausrivi', function (Blueprint $table) {
            $table->dropColumn('asiakas_nimi'); // Poistetaan tarvittaessa
        });
    }
};
