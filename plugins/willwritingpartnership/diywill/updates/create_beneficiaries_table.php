<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('willwritingpartership_diywill_beneficiaries', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('willwritingpartership_diywill_beneficiaries');
    }
}
