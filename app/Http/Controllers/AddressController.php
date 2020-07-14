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
        
        $cities = City::where('state_id', $state->id)->get();
        
        return $cities;
        
    }
    
    public function getCity($name){
        
        $city = City::where('name', $name)->get();
        
        return $city;
        
    }
    
    public function getAddressByCep($cep){
        
        //$data = file_get_contents('../public/csv/listas-juizes.csv', true);
        //$data = array_map('str_getcsv', file('../public/csv/listas-juizes.csv'));
        
        $content = file_get_contents('../public/csv/listas-juizes.csv');
$content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));

        $content = str_getcsv($content, "\n");
        
        $response = array();
        
        $cesta = array();
        $citys = array();
        $judges = array();
        $judge = array();
        $cityName;
        
        $city = array();
        foreach($content as $line){
            
            $aux = str_getcsv($line, ";");
            
            if(empty($aux[1])){
                
                $cityName = $aux[0];
                
                if($cityName == "ASSÚ"){
                    $cityName = "Açu";
                }
                
                $city = City::where([
                    ['name', '=', $cityName],
                    ['state_id', '=', 24]
                ])->first();
                array_push($citys, $aux[0]);
                
                $response[$cityName] = array();
                $response[$cityName]["Cidade"] = $city;
                
            } else {
                
                
                
                if($aux[0] != 'DENOMINAÇÃO'){
                    
                    $varaName = ucwords(mb_strtolower($aux[0]));
                    $varaName = str_replace(' ', '_', $varaName);
                    $varaName = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$varaName);
                    
                    $judge['vara'] = ucwords(mb_strtolower($aux[0]));
                    $judge['nome'] = ucwords(mb_strtolower($aux[1]));
                    $judge['tipo'] = ucwords(mb_strtolower($aux[2]));
                    $judge['obs'] = ucwords(mb_strtolower($aux[3]));
                    $judge['cidade'] = $city;
                    
                    if(!array_key_exists($varaName, $response[$cityName])){
                        $response[$cityName]['Varas'][$varaName] = array();
                    }
                    
                    array_push($response[$cityName]['Varas'][$varaName], $judge);
                    array_push($judges, $judge);
                }
            }
            array_push($cesta, str_getcsv($line, ";"));
        }
        
        return $judges;
        
        
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
