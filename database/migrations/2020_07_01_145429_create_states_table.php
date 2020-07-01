<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('uf', 2);
            $table->timestamps();
        });
        
        //Requisita dados das cidades e estados do brasil
        $client = new GuzzleHttp\Client();
        $response = $client->get('https://servicodados.ibge.gov.br/api/v1/localidades/distritos');
        
        $states = json_decode($response->getBody());
        
        foreach($states as $state){
            
            $stateAux = $state->municipio->microrregiao->mesorregiao->UF;
            
            $stateDB = DB::table('states')->where('id', $stateAux->id)->first();
            
            if(!$stateDB){
                DB::table('states')->insert(
                    array('id' => $stateAux->id,
                          'name' => $stateAux->nome,
                          'uf' => $stateAux->sigla)
                );
            }
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
