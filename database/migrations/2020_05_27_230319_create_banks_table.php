<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use GuzzleHttp\Client;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 3);
            $table->string('name');
            $table->timestamps();
        });
        
        //Requisita códigos e nomes dos bancos do brasil
        $client = new GuzzleHttp\Client();
        $response = $client->get('https://raw.githubusercontent.com/guibranco/BancosBrasileiros/master/bancos.json');
        
        $banks = json_decode($response->getBody());
        
        foreach($banks as $bank){
            
            DB::table('banks')->insert(
                array('code' => $bank->Code,
                      'name' => $bank->Name)
            );
            
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
