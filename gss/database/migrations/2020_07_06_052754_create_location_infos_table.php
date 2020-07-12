<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('block');
            $table->string('department');
            $table->string('floor');
            $table->string('room');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('location_infos')->insert(
        [
            [ 
                'block' => 'Admin Block',
                'department' => 'Admin',
                'floor' => 'Ground Floor',
                'room' => 'G01',
            ],
            [ 
                'block' => 'Admin Block',
                'department' => 'Admin',
                'floor' => 'Ground Floor',
                'room' => 'G02',
            ],
            [ 
                'block' => 'Main Block',
                'department' => 'CSE',
                'floor' => 'Ground Floor',
                'room' => 'G01',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_infos');
    }
}
