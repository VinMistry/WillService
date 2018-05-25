<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateClientDatasTable extends Migration
{
    public function up()
    {
        Schema::create('useraccount', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',5);
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('emailaddress',100);
            $table->string('contactnumber',50);
            $table->string('contactnumberwork',50);
            $table->string('contactnumberhome',50);
            $table->string('street',100);
            $table->string('city',50);
            $table->string('postcode',10);
            $table->boolean('termsandcon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('useraccount');
    }
}
