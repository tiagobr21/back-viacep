<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Psy\CodeCleaner\ReturnTypePass;

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

   public function getusers(){
      $users = Usuarios::all();

      echo $users;
   }

   public function createusers(Request $data){
     
       $users = new Usuarios;

       $users->nome = $data->nome;
       $users->idade = $data->idade;
       $users->cep = $data->cep;
       $users->logradouro = $data->logradouro;
       $users->complemento = $data->complemento;
       $users->bairro = $data->bairro;
       $users->localidade = $data->localidade;
       $users->uf = $data->uf;
       $users->created_at = date('Y-m-d H:i');
       $users->updated_at = date('Y-m-d H:i');  

       $nome = $users->nome;

       $users->save();

       return response()->json([
        "message"=>"Usuário $nome criado com sucesso"
       ],200);

     
   }
}
