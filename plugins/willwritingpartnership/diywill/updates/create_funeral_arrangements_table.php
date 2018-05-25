<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFuneralArrangementsTable extends Migration
{
    public function up()
    {
        Schema::create('funeralarrangements', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('testatorid');
            $table->foreign('testatorid')->references('id')->on('testators');
            $table->string('funeralPrearranged',50);
            $table->string('funeralPlanRefNo',50);
            $table->string('funeralFunded',50);
            $table->boolean('bodyToResearch');
            $table->boolean('organsForTransplant');
            $table->string('organsNotToUse',100);
            $table->boolean('cremationReq');
            $table->boolean('burialRequired');
            $table->string('servicePlace',200);
            $table->string('burOrCremPlace',200);
            $table->boolean('burriedOrScattered');
            $table->string('whereBurOrScat',200);
            $table->string('serviceReq',200);
            $table->boolean('familyFlowers');
            $table->string('donationInLieu',200);
            $table->timestamps();
        });

        Schema::create('will', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('userid')->nullable();
            $table->foreign('userid')->references('id')->on('useraccount');
            $table->integer('octoberid')->nullable();
            $table->foreign('octoberid')->references('id')->on('users');
            $table->integer('residestateid')->nullable();
            $table->foreign('residestateid')->references('id')->on('residualestate');
            $table->integer('executors')->nullable();
            $table->foreign('executors')->references('id')->on('appointedexecutors');
            $table->integer('funeralID')->nullable();
            $table->foreign('funeralID')->references('id')->on('funeralarrangements');
            $table->boolean('complete')->default(false);
            $table->integer('progress')->default(0);
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('FuneralArrangements');
        Schema::dropIfExists('will');
    }
}
