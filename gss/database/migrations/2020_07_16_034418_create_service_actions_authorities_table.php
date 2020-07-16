<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceActionsAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_actions_authorities', function (Blueprint $table) {
            $table->unsignedBigInteger('service_action_id');
            $table->unsignedBigInteger('authority_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('service_action_id')->references('id')->on('service_actions')->onDelete('cascade');
            $table->foreign('authority_id')->references('id')->on('authorities')->onDelete('cascade');
 
            //SETTING THE PRIMARY KEYS
            $table->primary(['service_action_id','authority_id'], 'service_actions_authorities_primary');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_actions_authorities');
    }
}
