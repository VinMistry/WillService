<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProfExecutorsTable extends Migration
{
    public function up()
    {
        Schema::create('professionalexecutors', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('appointedid');
            $table->foreign('appointedid')->references('id')->on('appointedexecutors');
            $table->boolean('twptoact');
            $table->string('firmname',50);
            $table->string('contactnumber',50);
            $table->string('street',100);
            $table->string('city',50);
            $table->string('postcode',10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professionalexecutors');
    }
}
