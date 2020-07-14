<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\City;
use App\Court;

class PopulateCourts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $content = file_get_contents('public/csv/listas-juizes.csv');
$content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));

        $content = str_getcsv($content, "\n");
        
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
                    
                    array_push($judges, $judge);
                }
            }
        }
        
        foreach($judges as $jaux){
            
            $test = DB::table('courts')->where([
                    ['vara', '=', $jaux['vara']],
                    ['city_id', '=', $jaux['cidade']['id']]
                ])->first();
            
            if($test == null){
                
                $test = DB::table('courts')->insert(
                array(
                      'vara' => $jaux['vara'],
                      'city_id' => $jaux['cidade']['id'])
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
        Court::truncate();
    }
}
