<?php

namespace App\Http\Controllers;

use App\Http\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class indexController extends Controller
{
   public function viacep(Request $cep){
       $api = 'viacep.com.br/ws/';
      
       $response = $cep->cep;

       $url = $api . $response . '/json';
     
       $cr = curl_init();
       curl_setopt($cr,CURLOPT_URL,$url);
       curl_setopt($cr,CURLOPT_RETURNTRANSFER,true);
       $response = curl_exec($cr);
       curl_close($cr);

       echo $response;
       
   }
}
