<?php
//Connection settings
function connect_db(){
    $db_host ="localhost";
    $db_name = "db_name";
    $db_user = "db_user";
    $db_pass = "sb_pass";
    $db_charset = "utf8";
    $db_con = "";
    
    try{
        $db_con = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset}",$db_user,$db_pass);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: " .$e->getMessage();
    }finally{
        return $db_con;
    }
}
function disconnect_db(){
    $db_con = null;    
}
?>