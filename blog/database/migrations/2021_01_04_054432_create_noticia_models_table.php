<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('title');
            $table->integer('autor_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->timestamps();
            $table->foreign('autor_id')->references('id')->on('autor');
            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
