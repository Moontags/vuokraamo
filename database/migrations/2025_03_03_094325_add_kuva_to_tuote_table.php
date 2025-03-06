<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('tuote', function (Blueprint $table) {
            $table->string('kuva')->nullable()->after('hinta');
        });
    }

    public function down()
    {
        Schema::table('tuote', function (Blueprint $table) {
            $table->dropColumn('kuva');
        });
    }
};
