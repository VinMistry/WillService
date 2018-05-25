<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('residualestate', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('passtospouse');
            $table->string('execludedfromwill',500);
            $table->timestamps();
        });

        Schema::create('beneficiary', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('residualestateid');
            $table->foreign('residualestateid')->references('id')->on('residualestate');
            $table->string('relationshiptest1',50);
            $table->string('relationshiptest2',50);
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('mobilenumber',50);
            $table->string('homenumber',50);
            $table->string('street',100);
            $table->string('city',50);
            $table->string('postcode',10);
            $table->integer('sharetobeneficiary');
            $table->integer('age');
            $table->boolean('toissue');
            $table->boolean('ifgiftfail');
            $table->boolean('reservebeneficiary');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beneficiary');
        Schema::dropIfExists('residualestate');
    }
}
