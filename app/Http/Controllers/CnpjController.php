<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class CnpjController extends Controller
{
    
    public function getCnpjInfo($cnpj){
        
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://cnpjs.rocks/cnpj/'. $cnpj);
        
        $dom = HtmlDomParser::str_get_html($response->getBody());
        
        $dados = $dom->find('div[class=dados]', 0);
        
        $lists = $dados->find('ul');
        
        $aux = [];
        
        $name = null;
        $name_fantasy = null;
        $opened_date = null;
        
        foreach($lists as $list){
            
            $items = $list->find('li');
            
            foreach($items as $item){
                
                preg_match('/([^\d]*):[ ]{2}(.*)/', $item->plaintext, $matches, PREG_OFFSET_CAPTURE);
                if(count($matches) >= 2){
                    if($matches[1][0] == "CNPJ"){
                        $cnpj = $matches[2][0];
                    }
                    if($matches[1][0] == "Razão Social"){
                        $name = $matches[2][0];
                    }
                    if($matches[1][0] == "Nome Fantasia"){
                        $name_fantasy = $matches[2][0];
                    }
                    if($matches[1][0] == "Data de Abertura"){
                        $opened_date = $matches[2][0];
                    }
                }
                
            }
            
        }
        
        return response()->json([
            'cnpj' => $cnpj,
            'name' => $name,
            'name_fantasy' => $name_fantasy,
            'opened_date' => $opened_date
            ]);
        
    }
    
}
