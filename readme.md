
## PARA USAR MVC CREADO POR LUIS ANGEL GUTIERREZ HERNANDEZ
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
PARA USAR NUESTRA BASE DE DATOS EN LAS FUNCIONES DEBEMOS CREAR MODELOS EN APP/MODELS CON  
namespace App\Models; y declarar proctected table ="nombre de la tabla" y en publicas declaremos los campos de nuestra tabla 
EJEMPLO
```PHP
namespace App\Models;
class Users extends DB{
    protected $table = 'users';
    public $nombre = null;
    public $apellidos = null;
    public $edad = null;
    
}
```
EN NUESTROS MODELOS PODEMOS USAR FUNCIONES LLAMANDO A ESTOS MODELOS POR EJEMPLO 
NOS SIRVE PARA INSERTAR SOLO NECESITAMOS PASAR LA INSTACIA AL METODO SAVE(INSTANCIA);
```PHP
namespace App\Controllers;
use App\Models\Users;
use App\Models\Socios;

class ControllerUser extends Controllers{
  
public function register($request){
         $Users = new Users();
         $Users->nombre = isset( $request->nombre) ? $request->nombre : NULL ;
         $Users->apellidos = isset( $request->apellidos) ? $request->apellidos : NULL ;
         $Users->edad = isset( $request->edad) ? $request->edad : NULL ;       
         $Users->save($Users);

}
```
PARA ACTUALIZAR NECESITAMOS COMO DE LA INSTACIA LA COLUMNA, OPERADOR Y VALOR DE NO PASAR OPERADOR SE TOMARA COMO = POR DEFECTO
```PHP
 $Users->update($Users,"id",97);    
```
CONSULTA TODOS LOS DATOS DE LA TABLA 
```PHP
 $Users->all();
```
CONSULTA POR ID Y TRAE EL REGISTRO
```PHP
 $Users->find(1);
```
CONSULTA CON CONDICION WHERE NECESITA COLUMN OPERADOR Y VALOR DE PASAR DOS PARAMETROS OPERADOR ES = SI SON 3 PARAMETROS USTED LO DETERMINA
```PHP
 $Users->where("id",1);
 $Users->where("id",">",1);
```
CONSULTA NORMAL
```PHP
 $Users->query("select * from table;");
```
CONSULTA CON LIMITE Y ORDENAMIENTO COLUMNA,ORDEN ASC O DESC Y CANTIDAD;
```PHP
 $Users->limit("nombre","desc",5);
```
CONSULTA CON LIMITE Y ORDENAMIENTO COLUMNA,ORDEN ASC O DESC Y CANTIDAD CON CONDICION SON 3 PARAMETROS MAS AL IGUAL OPERADOR POR DEFECTO =  COLUMN,OPERADOR,VALOR;
```PHP
 $Users->limit("nombre","desc",1,"id","5");
 $Users->limit("nombre","desc",5,"id",">","5");
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

