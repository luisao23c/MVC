<?php
Namespace App\Models;
use PDO;


class DB {
    public $servidor =DB_HOST;
    public $dbname =DB_NAME;
    public $username =DB_USER;
    public $password =DB_PASS;
    public $connection ="";
    protected $table ="";
        function __construct() {
            $this->connection = new PDO("mysql:host=$this->servidor;dbname=$this->dbname",$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }// Declaración de una propiedad    
        
        function all(){
            $sql = "SELECT * FROM {$this->table}";
           $setence =$this->connection->prepare($sql);
           $setence->execute();
           $setence->setFetchMode(PDO::FETCH_ASSOC);

           return json_encode($setence->fetchAll());
           
        }


         function find($id){
            $sql = "SELECT * FROM {$this->table} WHERE id = {$id};";
            $setence =$this->connection->prepare($sql);
           $setence->execute();
           $setence->setFetchMode(PDO::FETCH_ASSOC);
           return json_encode($setence->fetchAll());
         } 
         function where($column,$operator,$value = null){
            if($value == null){
               $value = $operator;
               $operator = "=";
            }
            if(gettype($value)=="string"){
                $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} \"{$value}\"";

            }
            else{
                $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} {$value}";

            }
            $setence =$this->connection->prepare($sql);
            $setence->execute();
            $setence->setFetchMode(PDO::FETCH_ASSOC); 
            return json_encode($setence->fetchAll());

        }
        function limit($column, $order, $limit = null,$columnwhere = null,$operator = null,$valuewhere = null){
            $sql = null;
            if($limit == null &&$columnwhere == null &&$operator == null && $valuewhere == null) 
            {
                $sql = "SELECT * FROM {$this->table} GROUP BY {$column} {$order};";

            }
            else if($valuewhere == null && $columnwhere != null && $operator != null)
            {
             $valuewhere = $operator;
             $operator = "=";
             if(gettype($valuewhere)=="string"){
                $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} \"{$valuewhere}\" GROUP BY {$column} {$order} LIMIT {$limit};";
            }
            else{
             $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} {$valuewhere} GROUP BY {$column} {$order} LIMIT {$limit};";
            }
            }
            else if($columnwhere == null &&$operator == null && $valuewhere == null){
                $sql = "SELECT * FROM {$this->table} GROUP BY {$column} {$order} LIMIT {$limit};";
            }
            else if($column !=null && $order !=null && $limit != null && $columnwhere != null && $operator != null &&$valuewhere != null){
                if(gettype($valuewhere)=="string"){
                    $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} \"{$valuewhere}\" GROUP BY {$column} {$order} LIMIT {$limit};";
                }
                else{
                 $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} {$valuewhere} GROUP BY {$column} {$order} LIMIT {$limit};";
                }

            }

            $setence =$this->connection->prepare($sql);
            $setence->execute();
            $setence->setFetchMode(PDO::FETCH_ASSOC); 

            return json_encode($setence->fetchAll());

        }
        function query($sql){
            $setence =$this->connection->prepare($sql);
            $setence->execute();
            $setence->setFetchMode(PDO::FETCH_ASSOC); 
            return json_encode($setence->fetchAll());
        }                

        function save($instance){
            $data = array();
            $vars_clase  =  get_object_vars($instance);
            $sql = "show columns from {$this->table}";
            $setence =$this->connection->prepare($sql);
            $setence->execute();
            $setence->setFetchMode(PDO::FETCH_ASSOC); 
            $response = [];
            foreach($setence as $key => $value){
                    if (array_key_exists($value["Field"], $vars_clase)) {
                        if ($vars_clase[$value["Field"]] !=NULL) {
                            array_push($data,$vars_clase[$value["Field"]]);
                            array_push($response,$value["Field"]);
                        }
                    }
                }
        $response = implode(',',$response);     
        $data = "'". implode("','",$data)."'";     
        $sql = "INSERT INTO {$this->table} ({$response}) VALUES ({$data});";
    $setence =$this->connection->prepare($sql);
    $setence->execute();    
    }

    function update($instance,$column,$operator,$val=null) {
        $data = array();
        $vars_clase  =  get_object_vars($instance);
        $sql = "show columns from {$this->table}";
        $setence =$this->connection->prepare($sql);
        $setence->execute();
        $setence->setFetchMode(PDO::FETCH_ASSOC); 
        $response = [];
        $sql = "";
        foreach($setence as $key => $value){
                if (array_key_exists($value["Field"], $vars_clase)) {
                    if ($vars_clase[$value["Field"]] !=NULL) {
                    $sql =  $sql . $value["Field"]."=" ."'".$vars_clase[$value["Field"]]."'". ",";
                    }
                }
            }
            $sql = substr($sql, 0, -1);
            $sql = "UPDATE {$this->table} SET ". $sql;
            if($val == null){
                $val = $operator;
                $operator = "=";
             }
             if(gettype($value)=="string"){
                 $sql = $sql ." WHERE {$column} {$operator} \"{$val}\"";
 
             }
             else{
                 $sql = $sql ." WHERE {$column} {$operator} {$val}";
 
             }
             $sql = $sql .";";
             echo $sql;            
    $setence =$this->connection->prepare($sql);
    $setence->execute();

    }


    function delete($column,$operator,$value = null){
        if($value == null){
           $value = $operator;
           $operator = "=";
        }
        if(gettype($value)=="string"){
            $sql = "DELETE FROM {$this->table} WHERE {$column} {$operator} \"{$value}\"";

        }
        else{
            $sql = "DELETE  FROM {$this->table} WHERE {$column} {$operator} {$value}";

        }
        $setence =$this->connection->prepare($sql);
        $setence->execute();
        $setence->setFetchMode(PDO::FETCH_ASSOC); 
        return json_encode($setence->fetchAll());

    }

}
