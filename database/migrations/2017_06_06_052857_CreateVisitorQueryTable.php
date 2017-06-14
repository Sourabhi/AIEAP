<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorQueryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queryvisitors', function (Blueprint $table) {
            $table->increments('id')-> primary;
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->string('email',45) -> unique;
            $table->string('phone',15);
            $table->string('nationality',45);
            $table->longText('message');
            /*$table->timestamps();*/
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
        Schema::drop('queryvisitors');
    }
}
