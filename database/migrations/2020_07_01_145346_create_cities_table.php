<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('state_id');
            $table->timestamps();
        });
        
        //Requisita dados das cidades e estados do brasil
        $client = new GuzzleHttp\Client();
        $response = $client->get('https://servicodados.ibge.gov.br/api/v1/localidades/distritos');
        
        $cities = json_decode($response->getBody());
        
        foreach($cities as $city){
            
            $cityAux = $city->municipio;
            
            $stateDB = DB::table('cities')->where('id', $cityAux->id)->first();
            
            if(!$stateDB){
                DB::table('cities')->insert(
                    array('id' => $cityAux->id,
                          'name' => $cityAux->nome,
                          'state_id' => $cityAux->microrregiao->mesorregiao->UF->id)
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
        Schema::dropIfExists('cities');
    }
}
