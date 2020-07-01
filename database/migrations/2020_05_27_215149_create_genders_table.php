<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        DB::table('genders')->insert(
            array('id' => 1,
                  'name' => 'Masculino')
        );
        DB::table('genders')->insert(
            array('id' => 2,
                  'name' => 'Feminino')
        );
        DB::table('genders')->insert(
            array('id' => 3,
                  'name' => 'Outros')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genders');
    }
}
