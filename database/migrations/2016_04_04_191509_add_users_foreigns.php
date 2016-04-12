<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->foreign('filial_id')
                  ->references('id')
                  ->on('filials')
                  ->onDelete('set null');

            $table->foreign('job_id')
                  ->references('id')
                  ->on('jobs')
                  ->onDelete('set null');      
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            $table->dropForeign('users_job_id_foreign');
            $table->dropColumn('job_id');

            $table->dropForeign('users_filial_id_foreign');
            $table->dropColumn('filial_id');
    }
}
