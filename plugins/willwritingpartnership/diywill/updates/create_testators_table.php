<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTestatorsTable extends Migration
{
    public function up()
    {
        Schema::create('testators', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('userid');
            $table->foreign('userid')->references('id')->on('useraccount');
            $table->string('maritalstatus',50);
            $table->integer('lengthOfMaritalStatus');
            $table->integer('childrencurrent');
            $table->integer('childrenprevious');
            $table->integer('childrenunder18');
            $table->date('dob');
            $table->string('alsoknownas',50);
            $table->string('formerly',50);
            $table->boolean('fullysighted');
            $table->string('bornintown',100);
            $table->string('bornincountry',100);
            $table->string('nationality',50);
            $table->string('jobtitle',10);
            $table->string('employer',50);
            $table->timestamps();
        });


    }

    public function down()
    {
        Schema::dropIfExists('will');
        Schema::dropIfExists('funeralarrangements');
        Schema::dropIfExists('testators');
    }
}
