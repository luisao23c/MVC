PARA USAR MVC 
VAYA DIRECTAMENTE AL ARCHIVO ROUTE EN CARPETA APP/CONTROLLERS
------------------------------------------------------------
AQUI CREE UN ARCHIVO DE PREFERENCIA Controller(nombre).php
EN EL ARCHIVO PONGA 
Namespace App/Controllers;
DECLARE SU CLASE POR EJEMPLO 
class ejemplo{
    function ejemplo(){

    }
}
------------------------------------------------------------
PARA USAR FUNCIONES EXTIENDA DEL ARCHIVO controllers.php
EJEMPLO
class ejemplo extends Controllers{
     function ejemplo(){

    }
}
------------------------------------------------------------
PARA USAR VISTAS VAYA DIRECTAMENTE A LA CARPETA RESOURCES VIEWS SI NECESITA CREAR CARPETAS HAGALO ADENTRO DE ESTA CARPETA
------------------------------------------------------------
PARA USAR NUESTRAS VISTAS DESDE NUESTRO CONTROLADOR CREADO LLAME LA FUNCION VIEW COMO SE MUESTRA
EJEMPLO
class ejemplo extends Controllers{
     function ejemplo(){
     return $this->view("nombre de la vista o carpeta.vista");
    }
}
------------------------------------------------------------
EJEMPLO 
     return $this->view("login");
EJEMPLO 
     return $this->view("auth.login");
------------------------------------------------------------
PARA USAR VARIABLES EN NUESTRAS VISTAS PASAMOS EN UN ARRAY EJEMPLO
EJEMPLO 
     return $this->view("login",[
        "title" => "EJEMPLO",
        "description" => "EJEMPLO"
     ]);
EJEMPLO 
     return $this->view("auth.login",
     [
        "title" => "EJEMPLO",
        "description" => "EJEMPLO"
     ]);
------------------------------------------------------------
PARA PODER VER ESTO EN NUESTRAS VISTAS LAS EXTRAEMOS COMO CUALQUIER VARIABLE PHP LLAMANDOLA 
EJEMPLO
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $title?></h1>
    <h2><?php echo $description?></h2>
</body>
</html>
PARA PODER USAR NUESTRAS FUNCIONES CREAREMOS RUTAS EN ROUTES/WEB.PHP
------------------------------------------------------------
PARA USAR DECLARE DE LA SIGUIENTE MANERA 
Route::get("/nombre de como quiere llamar la ruta"["nombre del controlador::class,"funcion a llamar"]);
EJEMPLO
Route::get('/register',[ControllerUser::class,"register"]);





