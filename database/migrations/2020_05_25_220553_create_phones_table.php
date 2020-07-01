<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ddi', '3')->default('55');
            $table->string('ddd', '3');
            $table->string('number', '15');
            $table->timestamps();
        });
        
        DB::table('phones')->insert(
            array('id' => 1,
                  'ddd' => '84',
                  'number' => '33163891')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
