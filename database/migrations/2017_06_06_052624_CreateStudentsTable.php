<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id')-> primary;
            $table->string('title',10);
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->string('date_of_birth',45);
            $table->string('gender',45);
            $table->string('house_no',45);
            $table->string('town',45);
            $table->string('state',45);
            $table->string('postcode',5);
            $table->string('country',45);
            $table->string('nationality',45);
            $table->string('phone',15);
            $table->string('email',45) -> unique;
            $table->longText('comments');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestampTz('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
