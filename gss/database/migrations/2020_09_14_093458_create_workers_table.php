<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('available')->default(true);
            $table->bigInteger('num_workingdays')->nullable();
            $table->bigInteger('num_leavedays')->nullable();
            $table->bigInteger('salary');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('ticket_infos')->onDelete('cascade');
            $table->bigInteger('avg_days')->nullable();
            $table->bigInteger('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
