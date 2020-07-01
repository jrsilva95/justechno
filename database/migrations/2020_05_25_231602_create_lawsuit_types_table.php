<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsuitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawsuit_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('business_id');
            $table->timestamps();
        });
        
        DB::table('lawsuit_types')->insert(
            array('id' => 1,
                  'name' => 'Trabalhista',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_types')->insert(
            array('id' => 2,
                  'name' => 'Indenizatória',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_types')->insert(
            array('id' => 3,
                  'name' => 'Cobrança',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_types')->insert(
            array('id' => 4,
                  'name' => 'Execução',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_types')->insert(
            array('id' => 5,
                  'name' => 'Previdenciário',
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
        Schema::dropIfExists('lawsuit_types');
    }
}
