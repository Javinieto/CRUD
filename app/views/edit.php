<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CheeseDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Cheese.php');


//Compruebo que me llega por GET el parámetro
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $cheeseDAO = new QuesoDAO();
    $cheese = $cheeseDAO->selectById($id);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gestión de quesos</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>
         <!-- Navigation -->
        <nav class="navbar navbar-light navbar-fixed-top navbar-expand-md bg-faded" role="navigation" style="background-color: #e3f2fd;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../../index.php"> <img src="../../assets/img/small-logo.png" alt="" ></a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto ">
                    <li class="nav-item active">
                      <a type="button" class="btn btn-info " href="app/views/insert.php">Crear un queso</a>
                    </li>
                  </ul>
                    
                </div>
              </nav>

        <!-- Page Content -->
        <div class="container">
            <form class="form-horizontal" method="post" action="../controllers/editController.php">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $cheese->getNombre(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Procedencia" class="col-sm-2 control-label">Abilities</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Procedencia" value="<?php echo $cheese->getProcedencia(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Descripcion" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $cheese->getDescripcion(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Sabor" class="col-sm-2 control-label">Sabor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sabor" name="sabor" placeholder="Sabor" value="<?php echo $cheese->getSabor(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Tipo" class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?php echo $cheese->getTipo(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Imagen" class="col-sm-2 control-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Imagen" value="<?php echo $cheese->getImagen(); ?>">
                    </div>
                </div>
                
                <input type="hidden" name="id" value="<?php echo $cheese->getID(); ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Edit</button>
                    </div>
                </div>
            </form>

            <!-- Footer -->
           <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; A. F. 2017</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="../../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/js/bootstrap.min.js"></script>
    </body>

</html>


