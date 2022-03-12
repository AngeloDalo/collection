<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable(); //se abbiamo già dati bisogna mettere nullable per evitare errori
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->dropForeign('comics_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
