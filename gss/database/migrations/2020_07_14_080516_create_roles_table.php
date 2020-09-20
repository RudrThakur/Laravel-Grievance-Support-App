<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // edit posts
            $table->string('slug'); //edit-posts
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Seed
        DB::table('roles')->insert(
        [
            [ 'name' => 'Admin',
            'slug' => 'admin'],
            [ 'name' => 'Faculty',
            'slug' => 'faculty'],
            [ 'name' => 'Worker',
            'slug' => 'worker'],
            [ 'name' => 'Registrar',
            'slug' => 'registrar'],
            [ 'name' => 'Principal',
            'slug' => 'principal'],
            [ 'name' => 'Director',
            'slug' => 'director'],
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
        Schema::dropIfExists('roles');
    }
}
