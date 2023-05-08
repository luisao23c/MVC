<?php
namespace App\Controllers;
use App\Models\Users;
use App\Models\Socios;

class ControllerUser extends Controllers{
  
public function register($request){
         $Users = new Users();
         $Users->nombre = isset( $request->nombre) ? $request->nombre : NULL ;
         $Users->apellidos = isset( $request->apellidos) ? $request->apellidos : NULL ;
         $Users->edad = isset( $request->edad) ? $request->edad : NULL ;       
        //  $Users->save($Users);
        //   $Users->update($Users,"id",97);    
//     // echo  $Users->where("id",1);
//     return  $this->view("Users",[
//         "title" =>"bienvenido",
//         "action" =>"3"
//     ]);
}
public function login(){
    echo "Login";
}
}
?>