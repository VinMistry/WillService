<?php namespace WillWritingPartership\DIYWill\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateResBeneficiariesTable extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        Schema::dropIfExists('willwritingpartership_diywill_res_beneficiaries');
    }
}
