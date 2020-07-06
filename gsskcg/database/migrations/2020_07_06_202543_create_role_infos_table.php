<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('role_infos')->insert(
        [
                [ 
                    'role' => 'Admin',
                ],
                [ 
                    'role' => 'User',
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
        Schema::dropIfExists('role_infos');
    }
}
