<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriorityInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('priority');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('priority_infos')->insert(
            [
                [ 'priority' => 'Low'],
                [ 'priority' => 'Medium'],
                [ 'priority' => 'High'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority_infos');
    }
}
