<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsuitStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawsuit_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('business_id');
            $table->timestamps();
        });
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 1,
                  'name' => 'Pendente de análise',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 2,
                  'name' => 'Pendente de documentação',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 3,
                  'name' => 'Setor Extrajudicial',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 4,
                  'name' => 'Pendente de Protocolo',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 5,
                  'name' => 'Administrativo',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 6,
                  'name' => 'Judicial',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 7,
                  'name' => 'Em acordo',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 8,
                  'name' => 'Desistido',
                  'business_id' => 1)
        );
        
        DB::table('lawsuit_statuses')->insert(
            array('id' => 9,
                  'name' => 'Arquivado',
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
        Schema::dropIfExists('lawsuit_statuses');
    }
}
