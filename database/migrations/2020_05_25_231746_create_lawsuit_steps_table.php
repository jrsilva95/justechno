<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsuitStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawsuit_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('business_id');
            $table->timestamps();
        });
        
        DB::table('lawsuit_steps')->insert(
            array('id' => 1,
                  'name' => 'Ação de conhecimento',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_steps')->insert(
            array('id' => 2,
                  'name' => 'Execução de título extrajudicial',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_steps')->insert(
            array('id' => 3,
                  'name' => 'Execução de título judicial',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_steps')->insert(
            array('id' => 4,
                  'name' => 'Cumprimento de sentença',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_steps')->insert(
            array('id' => 5,
                  'name' => 'INSS',
                  'business_id' => 1)
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawsuit_steps');
    }
}
