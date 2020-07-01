<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('address_id')->nullable();
            $table->integer('phone_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->timestamps();
        });
        
        DB::table('businesses')->insert(
            array('name' => 'Lourenna Fernandes',
                  'id' => 1,
                  'address_id' => 1,
                  'phone_id' => 1)
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
