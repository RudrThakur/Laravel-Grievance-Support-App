<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorityInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authority_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('authority');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('authority_infos')->insert(
        [
                [ 
                    'authority' => 'Admin',
                ],
                [ 
                    'authority' => 'Registrar',
                ],
                [ 
                    'authority' => 'Principal',
                ],
                [ 
                    'authority' => 'Director',
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
        Schema::dropIfExists('authority_infos');
    }
}
