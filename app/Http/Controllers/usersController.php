<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuarios;


class usersController extends Controller
{
    public function getAllUsers(){
        $users = Usuarios::all();
  
        return response()->json($users);

     }
  
     public function getSingleUser($id){
     
      $user =  Usuarios::findOrFail($id);
  
      return response()->json($user);
  
  
     }
  
     public function createUsers(Request $data){
       
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
  
     public function deleteUsers($id){
  
          Usuarios::findOrFail($id)->delete();
          
          $data = Usuarios::findOrFail($id);
  
          $nome = $data->nome; 
  
          return response()->json([
              "message"=>"Usuário $nome deletado com sucesso"
          ],200);  
          
      }
  
    public function updateUsers(Request $request,$id){
  
     $update = Usuarios::find($id);
  
     if(isset($request->nome)){
       $update->nome = $request->nome;
     }
     
     if(isset($request->idade)){
       $update->idade = $request->idade;
     }
     
     if(isset($request->cep)){
      $update->cep = $request->cep;
     }
     
     if(isset($request->logradouro)){
      $update->logradouro = $request->logradouro;
     }
     
     if(isset($request->complemento)){
      $update->complemento = $request->complemento;
     }
     
     if(isset($request->bairro)){
      $update->bairro = $request->bairro;
     }
     
     if(isset($request->localidade)){
      $update->localidade = $request->localidade;
     }
     
     if(isset($request->uf)){
      $update->uf = $request->uf;
     }
  
     $update->save();
      
      return response()->json([
          "message"=>"Usuário atualizado com sucesso"
      ],200);   
      
    } 
      
}
