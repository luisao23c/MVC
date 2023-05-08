
## PARA USAR MVC 
VAYA DIRECTAMENTE AL ARCHIVO ROUTE EN CARPETA APP/CONTROLLERS

AQUI CREE UN ARCHIVO DE PREFERENCIA Controller(nombre).php
EN EL ARCHIVO PONGA 
Namespace App/Controllers;
DECLARE SU CLASE POR EJEMPLO 
```PHP
class ejemplo{
    function ejemplo(){}
}
```
------------------------------------------------------
PARA USAR FUNCIONES EXTIENDA DEL ARCHIVO controllers.php
EJEMPLO
```PHP
class ejemplo extends Controllers{
     function ejemplo(){}
}
```
PARA USAR VISTAS VAYA DIRECTAMENTE A LA CARPETA RESOURCES VIEWS SI NECESITA CREAR CARPETAS HAGALO ADENTRO DE ESTA CARPETA
PARA USAR NUESTRAS VISTAS DESDE NUESTRO CONTROLADOR CREADO LLAME LA FUNCION VIEW COMO SE MUESTRA
EJEMPLO
```PHP

class ejemplo extends Controllers{
     function ejemplo(){
     return $this->view("nombre de la vista o carpeta.vista");
    }
}
```
EJEMPLO 
```PHP
     return $this->view("login");
```
EJEMPLO
```PHP
     return $this->view("auth.login");
```
PARA USAR VARIABLES EN NUESTRAS VISTAS PASAMOS EN UN ARRAY EJEMPLO
```PHP
 return $this->view("login",[
        "title" => "EJEMPLO",
        "description" => "EJEMPLO"
     ]);
```
PARA PODER VER ESTO EN NUESTRAS VISTAS LAS EXTRAEMOS COMO CUALQUIER VARIABLE PHP LLAMANDOLA 
EJEMPLO
```PHP
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div id="css"></div>

</head>
<body>
</body>
<div id="scripts"></div>
<script>
window.onload = function() {
    script("users");//JS
    link("estilos");//CSS
}    
</script>
```
ES IMPORTANTE TENERLO PARA INVOCAR CSS
```PHP
    <div id="css"></div>
```
ES IMPORTANTE TENERLO PARA INVOCAR JS
```PHP
<div id="scripts"></div>
```
LLAMAR JS Y CSS SIN PODER CREAR CARPETAS DE MOMENTO CREAR LOS CSS EN PUBLIC/CSS + NOMBRE.CSS Y EN JS PUBLIC/JS + NOMBRE.JS
```PHP
<script>
window.onload = function() {
    script("users");//JS
    link("estilos");//CSS
}    
</script>
```
PARA PODER USAR NUESTRAS FUNCIONES CREAREMOS RUTAS EN ROUTES/WEB.PHP
PARA USAR DECLARE DE LA SIGUIENTE MANERA 
```PHP
Route::get("/nombre de como quiere llamar la ruta"["nombre del controlador::class,"funcion a llamar"]);
```
EJEMPLO
```PHP
Route::get('/register',[ControllerUser::class,"register"]);
```

