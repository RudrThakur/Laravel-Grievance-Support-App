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
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('service_actions_id')->nullable();
            $table->foreign('service_actions_id')->references('id')->on('service_actions')->onDelete('cascade');
            $table->boolean('available')->default(true);
            $table->bigInteger('num_workingdays')->nullable();
            $table->bigInteger('num_leavedays')->nullable();
            $table->bigInteger('salary');
            $table->bigInteger('avg_tat')->nullable();
            $table->bigInteger('rating')->nullable();
            $table->bigInteger('tat_Painting')->default(4);
            $table->bigInteger('tat_Plumbing')->default(6);
            $table->bigInteger('tat_HouseKeeping')->default(2);
            $table->bigInteger('tat_Airconditioner')->default(3);
            $table->bigInteger('tat_Electrical')->default(8);
            $table->bigInteger('tat_Interior')->default(10);
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
