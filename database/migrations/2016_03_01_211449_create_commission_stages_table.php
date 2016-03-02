<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commission_id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->date('start_at');
            $table->date('end_at');
            $table->timestamps();
           
            $table->foreign('commission_id')
                  ->references('id')
                  ->on('commissions')
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
        Schema::drop('commission_stages');
    }
}
