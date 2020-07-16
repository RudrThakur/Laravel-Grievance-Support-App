<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // edit posts
            $table->string('slug'); // edit-posts
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('authorities')->insert(
            [
                [ 'name' => 'Admin',
                    'slug' => 'admin'
                ],
                [ 'name' => 'Registrar',
                'slug' => 'registrar'
                ],
                [ 'name' => 'Principal',
                'slug' => 'principal'
                ],
                [ 'name' => 'Director',
                'slug' => 'director'
                ],
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
        Schema::dropIfExists('authorities');
    }
}
