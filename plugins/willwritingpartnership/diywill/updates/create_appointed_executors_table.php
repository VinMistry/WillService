<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAppointedExecutorsTable extends Migration
{
    public function up()
    {
        Schema::create('appointedexecutors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('spousetobeexec');
            $table->boolean('mirrorexecutor');
            $table->string('spousetype', 50);
            $table->timestamps();
        });
    }

    public function down()
    {

        Schema::dropIfExists('will');
        Schema::dropIfExists('executors');
        Schema::dropIfExists('professionalexecutors');
        Schema::dropIfExists('appointedexecutors');
    }
}