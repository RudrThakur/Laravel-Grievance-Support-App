<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // edit posts
            $table->string('slug'); //edit-posts
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });


        // Seed
        DB::table('permissions')->insert(
            [
                ['name' => 'Create Ticket',
                'slug' => 'create-ticket'],
                ['name' => 'Delete Ticket',
                'slug' => 'delete-ticket'],
                ['name' => 'Close Ticket',
                'slug' => 'close-ticket'],
                ['name' => 'Create User',
                'slug' => 'create-user'],
                ['name' => 'Manage Users',
                'slug' => 'manage-users'],
                ['name' => 'Service Action',
                'slug' => 'service-action'],
                ['name' => 'Service Approval',
                'slug' => 'service-approval'],
                ['name' => 'Manage Tickets',
                'slug' => 'manage-tickets'],    
                ['name' => 'Delete User',
                'slug' => 'delete-user'],
                ['name' => 'Manage Permissions',
                'slug' => 'manage-permissions'],
                ['name' => 'Feedback Permission',
                'slug' => 'feedback-permission'],
                ['name' => 'View Tickets',
                'slug' => 'view-tickets'],
                ['name' => 'Manage Roles',
                'slug' => 'manage-roles'],
                ['name' => 'Manage Feedbacks',
                'slug' => 'manage-feedbacks'],
                ['name' => 'Analyse Statistics',
                'slug' => 'analyse-statistics'],
                ['name' => 'View Dashboard',
                'slug' => 'view-dashboard'],
                ['name' => 'View Ticket Details',
                'slug' => 'view-ticket-details'],

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
        Schema::dropIfExists('permissions');
    }
}
