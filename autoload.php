<?php

spl_autoload_register(function($clase){
        if($clase != "Publics\Js\Config_Global\Js" && $clase != "Publics\Css\Config_Global\Css"){
        $ruta = str_replace("\\","/",$clase).".php";

        if(file_exists($ruta)){
            require_once($ruta);
        }
       
        else{
            die("No se puede cargar la clase $clase");
        }
    }else{
        if($clase == "Publics\Js\Config_Global\Js"){
            $ruta ="public/js/config_global/formatjs.php";

            if(file_exists($ruta)){
                require_once($ruta);
            }
            else{
            echo $ruta;
            }
        }
         else if
         ($clase == "Publics\Css\Config_Global\Css"){
            $ruta ="public/css/config_global/formatcss.php";

            if(file_exists($ruta)){
                require_once($ruta);
            }
            else{
            echo $ruta;
            }
         }
    
}
   
});

 
?>