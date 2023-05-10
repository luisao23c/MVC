<?php 
namespace App\Models;
class Users extends DB{
    protected $table = 'users';
    protected $primarykey = 'id';

    public $nombre = null;
    public $apellidos = null;
    public $edad = null;
    
   
}
?>