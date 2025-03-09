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
        Schema::table('vuokraus', function (Blueprint $table) {
            $table->dateTime('vuokrauspvm')->change();
            $table->dateTime('palautuspvm')->nullable()->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vuokraus', function (Blueprint $table) {
            //
        });
    }
};
