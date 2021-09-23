<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            // $table->string('nokartu');
            $table->date('tanggal');
            $table->integer('nokartu');
            $table->text('keperluan')->nullable();
            $table->time('waktu_kedatangan');
            $table->time('waktu_kepulangan')->nullable();
            $table->bigInteger('data_tamus_id')->nullable();
            $table->bigInteger('ruangans_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
