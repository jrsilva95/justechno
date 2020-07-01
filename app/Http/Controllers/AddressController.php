<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddressState;
use App\AddressCity;

class AddressController extends Controller
{
    public function getStates(Request $request){
        
        $states = AddressState::all();
        
        return $states;
        
    }
    
    public function getCities(AddressState $state){
        
        
        $cities = AddressCity::where('address_state_id', $state->id)->get();;
        
        return $cities;
        
    }
    
    public function getAddressByCep($cep){
        
        //Requisita dados das cidades e estados do brasil
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://viacep.com.br/ws/'. $cep .'/json/');
        
        $json = json_decode($response->getBody());
        
        $city = AddressCity::find($json->ibge);
        
        return response()->json([
            'cep' => $cep,
            'street' => $json->logradouro,
            'neighborhood' => $json->bairro,
            'city' => $city
        ]);
        
    }
}
