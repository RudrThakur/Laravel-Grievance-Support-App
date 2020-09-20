<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

         // Insert some stuff
        DB::table('service_infos')->insert(
        [
            [ 'category' => 'Painting',
            'subcategory' => 'Wall'],
            [ 'category' => 'Painting',
            'subcategory' => 'Window'],
            [ 'category' => 'Painting',
            'subcategory' => 'Door'],
            [ 'category' => 'Painting',
            'subcategory' => 'Others'],
            [ 'category' => 'Plumbing',
            'subcategory' => 'WashBasin'],
            [ 'category' => 'Plumbing',
            'subcategory' => 'Tap'],
            [ 'category' => 'Plumbing',
            'subcategory' => 'HealthFaucet'],
            [ 'category' => 'Plumbing',
            'subcategory' => 'WBC'],
            [ 'category' => 'Plumbing',
            'subcategory' => 'Others'],
            [ 'category' => 'HouseKeeping',
            'subcategory' => 'Cleaning'],
            [ 'category' => 'HouseKeeping',
            'subcategory' => 'Shifting'],
            [ 'category' => 'HouseKeeping',
            'subcategory' => 'Others'],
            [ 'category' => 'Airconditioner',
            'subcategory' => 'GeneralService'],
            [ 'category' => 'Airconditioner',
            'subcategory' => 'GasFilling'],
            [ 'category' => 'Airconditioner',
            'subcategory' => 'Others'],
            [ 'category' => 'Electrical',
            'subcategory' => 'Fan'],
            [ 'category' => 'Electrical',
            'subcategory' => 'LightFittings'],
            [ 'category' => 'Electrical',
            'subcategory' => 'UPS'],
            [ 'category' => 'Electrical',
            'subcategory' => 'Stabilizer'],
            [ 'category' => 'Electrical',
            'subcategory' => 'Telecom'],
            [ 'category' => 'Electrical',
            'subcategory' => 'PowerSockets'],
            [ 'category' => 'Electrical',
            'subcategory' => 'Others'],
            [ 'category' => 'Interior',
            'subcategory' => 'Fan'],
            [ 'category' => 'Interior',
            'subcategory' => 'Cabin'],
            [ 'category' => 'Interior',
            'subcategory' => 'Workstation'],
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
        Schema::dropIfExists('service_infos');
    }
}
