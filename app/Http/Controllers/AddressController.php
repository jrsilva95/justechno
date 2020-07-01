<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;

class AddressController extends Controller
{
    public function getStates(Request $request){
        
        $states = AddressState::all();
        
        return $states;
        
    }
    
    public function getCities(State $state){
        
        
        $cities = City::where('state_id', $state->id)->get();;
        
        return $cities;
        
    }
    
    public function getAddressByCep($cep){
        
        //Requisita dados das cidades e estados do brasil
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://www.cepaberto.com/api/v3/cep?cep='. $cep, [
            'headers' => [
                'Authorization' => 'Token token='. getenv('CEP_ABERTO_API_TOKEN')
            ]
        ]);
        
        $json = json_decode($response->getBody());
        
        $city = City::find($json->cidade->ibge);
        
        return response()->json([
            'cep' => $cep,
            'street' => $json->logradouro,
            'neighborhood' => $json->bairro,
            'city' => $city,
            'latitude' => $json->latitude,
            'longitude' => $json->longitude
        ]);
        
    }
}
