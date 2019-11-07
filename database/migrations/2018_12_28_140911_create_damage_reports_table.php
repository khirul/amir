<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("tel");
            $table->string("bahagian");
            $table->string("code")->index();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string("jenis_kerosakan");
            $table->date("tarikh_masuk");
            $table->integer("petugas")->index();
            $table->date("tarikh_keluar")->nullable();
            $table->string("nama_penerima")->nullable();
            $table->string("no_bdn_penerima")->nullable();
            $table->string("bahagian_penerima")->nullable();
            $table->string("status_laporan")->nullable();
            $table->string("tindakan")->nullable();
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
        Schema::dropIfExists('damage_reports');
    }
}
