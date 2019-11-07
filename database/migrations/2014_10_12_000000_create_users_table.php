<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('no_badan')->unique();
            $table->string('jawatan');
            $table->integer('rank_id');
            $table->string('email')->unique();
            $table->string('cawangan');
            $table->string('kontinjen')->nullable();
            // bukit_aman
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            // ********
            // kontinjen
            $table->integer('seccontingent_id')->nullable();
            $table->integer('sub_seccontingent_id')->nullable();
            // ********
            // daerah
            $table->integer('state_id')->nullable();
            $table->integer('district_id')->nullable();
            // ********
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
