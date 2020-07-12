<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('status_infos')->insert(
        [
                [ 
                    'status' => 'Pending',
                ],
                [ 
                    'status' => 'In Progress',
                ],
                [ 
                    'status' => 'On Hold',
                ],
                [ 
                    'status' => 'Closed',
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
        Schema::dropIfExists('status_infos');
    }
}
