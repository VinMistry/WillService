<?php
namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateWillTable extends Migration
{
    public function up()
    {

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
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('will');
    }
}