<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_id')->unique();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->bigInteger('rating');
            $table->boolean('admin')->default(false);
            $table->boolean('web_app')->default(false);
            $table->boolean('work')->default(false);
            $table->boolean('management')->default(false);
            $table->string('message');
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
        Schema::dropIfExists('tickets_feedback');
    }
}
