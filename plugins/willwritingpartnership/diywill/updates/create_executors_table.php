<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateExecutorsTable extends Migration
{
    public function up()
    {


        Schema::create('executors', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('appointedid');
            $table->foreign('appointedid')->references('id')->on('appointedexecutors');
            $table->string('executortype',50);
            $table->string('relationshiptest1',50);
            $table->string('relationshiptest2',50);
            $table->string('title',5);
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('contactnumber',50);
            $table->string('contactnumberhome',50);
            $table->string('street',100);
            $table->string('city',50);
            $table->string('postcode',10);
            $table->timestamps();
        });
    }

    public function down()
    {

        Schema::dropIfExists('executors');
    }
}
