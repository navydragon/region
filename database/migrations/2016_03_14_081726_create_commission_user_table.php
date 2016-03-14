<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_user', function (Blueprint $table) {
             $table->integer('commission_id')->unsigned()->index();
             $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');

             $table->integer('user_id')->unsigned()->index();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('commission_user');
    }
}
