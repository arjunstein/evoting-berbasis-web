<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKandidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_urut');
            $table->unsignedBigInteger('calon_ketua');
            $table->unsignedBigInteger('calon_wakil');
            $table->text('visi_misi');
            $table->timestamps();

            $table->foreign('calon_ketua')->references('id')->on('m_pemilih')->onDelete('restrict');
            $table->foreign('calon_wakil')->references('id')->on('m_pemilih')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kandidat');
    }
}
