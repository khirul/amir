<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('tajuk_journal', 128);
            $table->string('arahan', 2048);
            $table->string('tajuk_artikel', 2048);
            // $table->string('artikel', 2048);
            $table->date('tarikh_journal');
            $table->string('rujukan_fail');
            $table->integer('penyelia');
            $table->string('tindakan')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status_laporan')->nullable();
            $table->string('tindakan_penyelia', 2048)->nullable();
            $table->date('tarikh_tindakan')->nullable();
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
        Schema::dropIfExists('journals');
    }
}
