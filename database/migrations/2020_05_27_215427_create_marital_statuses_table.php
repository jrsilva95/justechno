<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        DB::table('marital_statuses')->insert(
            array('id' => 1,
                  'name' => 'Casado(a)')
        );
        DB::table('marital_statuses')->insert(
            array('id' => 2,
                  'name' => 'Divorciado(a)')
        );
        DB::table('marital_statuses')->insert(
            array('id' => 3,
                  'name' => 'Separado(a)')
        );
        DB::table('marital_statuses')->insert(
            array('id' => 4,
                  'name' => 'Solteiro(a)')
        );
        DB::table('marital_statuses')->insert(
            array('id' => 5,
                  'name' => 'União Estável')
        );
        DB::table('marital_statuses')->insert(
            array('id' => 6,
                  'name' => 'Viúvo(a)')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
}
