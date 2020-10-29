<?php 
    session_start();
    if(!isset($_SESSION['datos'])){
        $_SESSION['datos'] = array();
    }

    if(isset($_POST["enviar"])){
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $carrera = $_POST["txtCarreras"];
        $act = $_POST["act"];


        $datos = array(
            "nombre" => $nombre,
            "apellido" => $apellido,
            "carrera" => $carrera,
            "act" => $act
        );
        $_SESSION['datos'][$carrera] = $datos;
        print_r($_SESSION['datos']);
    }

    else if(isset($_POST['eliminar'])){
        $carrera = $_POST["txtCarreras"];

        foreach($_SESSION['datos'] as $key => $value){
            if(in_array($key, $carrera)){
                unset($_SESSION['datos'][$key]);
            }
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tarea 8</title>
  </head>
  <body>


    <!-- Contenido -->
    <div class="container">
    <h1>Registro de estudiantes</h1> 
        <form action="" method="post">
            <!-- Row -->
            <div class="form-row">
                <!-- Columna -->
                <div class="col-md-6">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtApellido">Apellido</label>
                        <input type="text" class="form-control" id="txtApellido" name="txtApellido">
                        </div>
                    </div>

                    <div class="form-group ">
                        <select class="custom-select" name="txtCarreras">
                            <option value="">Carrera a la cual pertenece </option>
                            <option value="Redes">Redes</option>
                            <option value="Software">Software</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Mecatronica">Mecatronica</option>
                            <option value="Seguridad informática">Seguridad informática</option>
                        </select>
                    </div>
                
                    <fieldset class="form-group">
                        
                        <input class="form-check-input" type="radio" name="act" id="Activo" value="Activo" checked>
                        <label class="form-check-label" for="Activo">
                            Activo
                        </label>

                        <input class="form-check-input" type="radio" name="act" id="Inactivo" value="Inactivo">
                        <label class="form-check-label" for="Inactivo">
                        Inactivo
                        </label>
                    
                    </fieldset>

                    <button type="submit" class="btn btn-primary" name="enviar">Sign in</button>
                <!-- End Columna  -->
                </div>

                <!-- Columna -->
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Carrera</th>
                            <th>Asignacion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tbody>

                        <tbody>
                            <?php 
                                foreach ($_SESSION['datos'] as$clave => $data){
                                    ?>
                                    <tr>
                                        <td><?php echo $data["nombre"] ?></td>
                                        <td><?php echo $data["apellido"] ?></td>
                                        <td><?php echo $data["carrera"] ?></td>
                                        <td><?php echo $data["act"] ?></td>
                                        <td><button class="btn btn-primary btn-sm" name="editar">Editar</button></td>
                                        <td><button class="btn btn-danger btn-sm" name="eliminar">Elimnar</button></td>
                                     </tr>   
                                <?php
                                } 
                        
                            
                            
                            ?>
                        </tbody>
                    </table>
                <!-- End Columna  -->
                </div>

            <!-- End Row         -->
            </div>
        </form>
        <!-- End Contenido -->
    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>