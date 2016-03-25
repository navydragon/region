<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SurveyquestionUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('survey_question_user', function (Blueprint $table) {
             $table->integer('survey_question_id')->unsigned()->index();
             $table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');

             $table->integer('user_id')->unsigned()->index();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

             $table->text('answer');
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
         Schema::drop('survey_question_user');
    }
}
