<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileBindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_binds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->string('bind_type');
            $table->integer('type_id');
            $table->timestamps();

            $table->foreign('file_id')
                  ->references('id')
                  ->on('files')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('file_binds');
    }
}
