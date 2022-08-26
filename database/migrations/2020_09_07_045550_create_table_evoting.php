<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEvoting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kandidat_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('kandidat_id')->references('id')->on('kandidat')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evoting', function (Blueprint $table) {
            //
        });
    }
}
