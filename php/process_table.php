<?php
require_once 'connection.php';
$db_con = connect_db();
    try{ 
        $sth = $db_con->prepare('SELECT Categories.category,Links.link,Links.status FROM Links INNER JOIN Categories ON Links.category = Categories.id');
        $sth->execute();
        return $sth;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>