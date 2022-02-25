<?php
include('Backend/conexion.php');
$query = "select * from imagenes";
$resultado = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link de bootcamp css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1 class="text-dark">Subir Imagen</h1>
                <form action="Backend/subir.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="my-input">Selecione una imagen </label>
                        <input id="my-input" type="file" name="imagen">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Titulo de la Imagen </label>
                        <input id="my-input" class="form-control" type="text" name="titulo">
                    </div>
                    <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['mensaje']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session_unset();
                    } ?>
                    <input type="submit" value="Guardar" class='btn btn-primary' name="Guardar">
                </form>
            </div>
            <div class="col-lg-8">
                <h1 class="text-dark text-center">Costa Rica Photos </h1>
                <hr>
                <div class="row row-cols-2 row-cols-md-2 g-4">
                    <?php foreach ($resultado as $row) { ?>
                        <div class="card-columns">
                            <div class="card">
                                <img src="Backend/imagenes/<?php echo $row['IMAGEN']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['NOMBRE']; ?></strong></h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- link de bootcamp js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>