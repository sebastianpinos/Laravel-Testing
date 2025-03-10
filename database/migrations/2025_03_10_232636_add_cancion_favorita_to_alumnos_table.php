<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCancionFavoritaToAlumnosTable extends Migration
{
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->string('cancion_favorita')->nullable()->after('edad');
        });
    }

    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('cancion_favorita');
        });
    }
}
