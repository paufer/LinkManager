<?php
require_once 'connection.php';
$db_con = connect_db();

if(isset($_POST['link_url'])){
        $link_category = trim($_POST['link_category']);
        $link_url = trim($_POST['link_url']);
    echo $link_category;
    try{ 
        $sth = $db_con->prepare('INSERT INTO Links (category,link,status) VALUES (:category,:link,2);');
        $sth->bindParam(':category', $link_category);
        $sth->bindParam(':link', $link_url);
        $sth->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
            try{ 
            $sth = $db_con->prepare('DELETE FROM Links WHERE :id=id');
            $sth->bindParam(':id', $_GET['id']);
            $sth->execute();
            header("Refresh:0; url=index.php?msg=ok");    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    if($_GET['action']=="status"){        
        if($_GET['current_status']==2){
            $sth = $db_con->prepare('UPDATE Links SET status = 1 WHERE id = :id;');
            $sth->bindParam(':id', $_GET['id']);
        }elseif($_GET['current_status']==1){
            $sth = $db_con->prepare('UPDATE Links SET status = 2 WHERE id = :id;');
            $sth->bindParam(':id', $_GET['id']);
        }
        try{
            $sth->execute();
            header("Refresh:0; url=/index.php");    
        }catch(PDOException $e){
        echo $e->getMessage();
        }
    }
}
function get_categories(){
    
    $db_con = connect_db();
    
    if($db_con){
        $sql        = 'SELECT * FROM Categories ORDER BY id DESC';
        $categories = $db_con->query($sql);
    }
    
    return $categories;
}

function get_links(){
    $db_con = connect_db();
    
    if($db_con){
        $sql    = 'SELECT Categories.category,Links.link,Links.status,Links.id FROM Links INNER JOIN Categories ON Links.category = Categories.id';        
        $links  = $db_con->query($sql);
    }
    return $links;
}
?>