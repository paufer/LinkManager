<?php 
include_once('php/process_links.php');
$categories = get_categories();
$links      = get_links(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
    <title>Enlases para lisensiados</title>
    <meta name="description" content="Una guía interactiva de primeros pasos para Brackets.">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="scripts.js"></script>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Gestor links <small>by Pau Fernández</small></h1>
            <a href="changelog.html"><span class="label label-default">Versión: 1.1</span></a>     
            
            
        </div>
        <div class="row">            
            <blockquote>
                <p>Que te hundo la vida!</p>
                <small>Frase célebre de <cite title="Nombre Apellidos">MM</cite></small>
            </blockquote>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <form role="form" id="linkAddForm">
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <select class="form-control" id="link_category" name="link_category">
                                <?php            
                                foreach ($categories as $row) {
                                    echo '<option value="' . $row['id'] . '">'. $row['category'] . '</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="enlace">Enlace</label>
                                <input type="url" class="form-control" id="link_url" name="link_url" placeholder="http://...">
                                <input type="hidden" id="action" name="action" value="addLink">
                            </div>
                            <div class="form-group">
                            <input type="submit" id="link_add_btn" class="btn btn-default" value="Añadir enlace">
                            </div>
                        </form>
                        <div class="alert alert-success hidden" id="alert-box-success" role="alert">Has añadido correctamente el enlace! Ahora a esperar a que quiera descargarlo :D</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Enlace</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php                  
                foreach ($links as $row) {
                    if($row['status']==1){$status="success";}else{$status="";}
                    echo '<tr class='.$status.'>';
                    echo '<td>'. $row['category'] . '</td>';
                    echo '<td><a href="'. $row['link'] . '">'. $row['link'] . '</a></td>';
                    ?>
                    <td>
                        <a href="php/process_links.php?action=status&id=<?php echo $row['id'].'&current_status='.$row['status']; ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>                 
                        <a href=""><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="php/process_links.php?action=delete&id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>                      
                    </td>
                    <?php
                    echo '</tr>';
                }                
                ?>
                </tbody>
            </table>
        </div>
        <div class="row">
        <hr>
        <p class="text-center">Made with <a href="http://paufernandezguardia.com"><span class="glyphicon glyphicon-heart" style="color:#f24848;"></span></a> from Tórax Hospital</p>
        <p class="text-center"><a href="https://github.com/paufer/LinkManager"><span class="fa fa-github" style=""></span></a></p>
        </div>
    </div>
    <!-- /container -->
</body>

</html>