<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vuokrausrivi', function (Blueprint $table) {
            $table->string('puhelin')->after('asiakas_nimi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('vuokrausrivi', function (Blueprint $table) {
            $table->dropColumn('puhelin');
        });
    }
};

