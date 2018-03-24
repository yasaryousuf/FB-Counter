<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adpages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('advertise_name', 200)->nullable();
            $table->string('advertise_name_slug', 200);
            $table->string('advertise_id', 30)->nullable()->unique();
            $table->string('type', 30)->default('page');
            $table->string('media', 50)->default('facebook');
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
        Schema::dropIfExists('adpages');
    }
}
