<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('km_actual')->nullable();
            $table->string('lts_add')->nullable();
            $table->string('date')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();
            $table->float('km_lt')->nullable();
            $table->float('wheeled')->nullable();
            $table->float('total_wheeled')->nullable();
            $table->string('saved')->nullable();
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
        Schema::dropIfExists('gas_tracks');
    }
}
