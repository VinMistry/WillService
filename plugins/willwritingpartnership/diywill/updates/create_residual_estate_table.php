<?php
namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateResidualEstateTable extends Migration{
    public function up()
    {
        Schema::create('residualestate', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('passtospouse');
            $table->string('execludedfromwill', 500);
            $table->timestamps();
        });
    }
        public function down()
        {

            Schema::dropIfExists('residualestate');
        }

}