<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('role_infos')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('dashboard_page')->default(false);
            $table->boolean('tickets_page')->default(false);
            $table->boolean('services_page')->default(false);
            $table->boolean('consumables_page')->default(false);
            $table->boolean('capital_equipments_page')->default(false);
            $table->boolean('hall_bookings_page')->default(false);
            $table->boolean('all_users_tickets')->default(false);
            $table->boolean('self_tickets')->default(false);
            $table->boolean('create_tickets')->default(false);
            $table->boolean('service_action')->default(false);
            $table->boolean('delete_all_users_tickets')->default(false);
            $table->boolean('delete_self_tickets')->default(false);
            $table->boolean('close_all_users_tickets')->default(false);
            $table->boolean('close_self_tickets')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        // Insert some stuff
        DB::table('permission_infos')->insert(
        [
            [ 
            'role_id' => 2,
            'dashboard_page' => true,
            'tickets_page' => true,
            'services_page' => true,
            'consumables_page' => true,
            'capital_equipments_page' => true,
            'hall_bookings_page' => true,
            'self_tickets' => true,
            'delete_self_tickets' => true,
            'close_self_tickets' => true,
            'create_tickets' => true,
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
        Schema::dropIfExists('permission_infos');
    }
}
