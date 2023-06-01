<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class viacepController extends Controller
{
   public function obtercep(Request $data){

        $api = 'viacep.com.br/ws/';

        if($data->idade < 18){
            return response()->json([
            "message"=>"Idade menor que 18 anos"
            ],400);
        }
      
       $response = $data->cep;

       $url = $api . $response . '/json';
     
       $cr = curl_init();
       curl_setopt($cr,CURLOPT_URL,$url);
       curl_setopt($cr,CURLOPT_RETURNTRANSFER,true);
       $response = curl_exec($cr);
       curl_close($cr);
      
       $response = json_decode($response,true);

       if($response['uf'] <> 'AM'){

         return response()->json([
            "message"=>"Cep fora do Amazonas"
         ],400);

       }else{
        
        return response()->json($response);
       }

       
   }

   public function buscacep(Request $data){
        $api = 'viacep.com.br/ws/';

        $uf =  $data->uf;
        $localidade = $data->localidade;
        $logradouro = $data->logradouro;

        $logradouro = explode(" ",$logradouro);

        $logradouro = implode("+",$logradouro);

         $url =  $api.$uf.'/'.$localidade.'/'.$logradouro.'/json';


        $cr = curl_init();
        curl_setopt($cr, CURLOPT_URL,$url);
        curl_setopt($cr,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($cr);
        curl_close($cr);

        $response = json_decode($response,true);
      
        return response()->json($response);

   }

   

}
