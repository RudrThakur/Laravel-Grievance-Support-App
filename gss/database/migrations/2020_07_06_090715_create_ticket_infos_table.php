<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

    // Insert some stuff
        DB::table('ticket_infos')->insert(
            [
                ['type' => 'Service'],
                ['type' => 'Consumable'],
                ['type' => 'Capital Equipment'],
                ['type' => 'Hall Booking'],
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
        Schema::dropIfExists('ticket_infos');
    }
}
