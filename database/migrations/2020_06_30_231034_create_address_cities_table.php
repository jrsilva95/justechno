<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('address_state_id');
            $table->timestamps();
        });
        
        //Requisita dados das cidades e estados do brasil
        $client = new GuzzleHttp\Client();
        $response = $client->get('https://servicodados.ibge.gov.br/api/v1/localidades/distritos');
        
        $cities = json_decode($response->getBody());
        
        foreach($cities as $city){
            
            $cityAux = $city->municipio;
            
            $stateDB = DB::table('address_cities')->where('id', $cityAux->id)->first();
            
            if(!$stateDB){
                DB::table('address_cities')->insert(
                    array('id' => $cityAux->id,
                          'name' => $cityAux->nome,
                          'address_state_id' => $cityAux->microrregiao->mesorregiao->UF->id)
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
        Schema::dropIfExists('address_cities');
    }
}
