<?php
namespace App\Controllers;

class Controllers {
    public function view($route,$data=[]){
        extract($data);
        $route = str_replace(".","/",$route);

        if(file_exists("./resources/views/{$route}.php")){
            include_once  "./public/css/config_global/config.php";
            include_once  "./public/js/config_global/config.php";
            include_once  "./resources/views/{$route}.php";
           
        }else{
            echo "el archivo no existe revise bien la rutas";
        }
    }
    public function onlyview($route,$data=[]){
        extract($data);
        $route = str_replace(".","/",$route);

        if(file_exists("./resources/views/{$route}.php")){
            include_once  "./resources/views/{$route}.php";
           
        }else{
            echo "el archivo no existe revise bien la rutas";
        }
    }
    
 
}
?>


           