<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<script>
    function clicking() {
        window.location.assign("index.php");
    }
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Los pollos hermanos</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index.php">Los pollos hermanos</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="index.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- formulario de agregar ventas -->
        <div class="card mb-5">
            <!-- agregar datos -->
            <div class="card-body">
                <h5 class="card-title">Diego Sebastian Lara Baeza</h5>
                <hr>
                <h3 class="card-title">Tabla Ventas</h3>

                <!-- mostrar mensaje de exito -->
                <?php if (isset($_GET['agregar'])) : ?>
                    <?php
                    if ($_GET['agregar'] == 'exito')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Datos agregados correctamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Error al agregar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-12">
                        <label for="idcliente" class="form-label">Id Cliente</label>
                        <input type="text" name="idcliente" class="form-control" placeholder="0000" required>
                    </div>
                    <div class="col-md-4">
                        <label for="idproducto" class="form-label">Id producto</label>
                        <input type="text" name="idproducto" class="form-control" placeholder="0000" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idsucursal" class="form-label">Id sucursal</label>
                        <input type="text" name="idsucursal" class="form-control" placeholder="0000" required>
                    </div>

                    <div class="col-md-4">
                        <label for="numeropaquetesllevados" class="form-label">Numero de paquetes llevados </label>
                        <input type="text" name="numeropaquetesllevados" class="form-control" placeholder="000" required>
                    </div>

                    <div class="col-md-6">
                        <label for="FechaDeCompra" class="form-label">Fecha de compra</label>
                        <input type="date" name="FechaDeCompra" class="form-control" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                        <label for="GananciaTotal" class="form-label">Ganancia total</label>
                        <input type="number" step=0.01 name="GananciaTotal" class=" form-control" placeholder="0000" required>
                    </div>
                    <div class="col-md-6">
                        <label for="NumeroDeTarjeta" class="form-label">Numero tarjeta</label>
                        <input type="number" step=0.01 name="NumeroDeTarjeta" class=" form-control" placeholder="0000" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="Registrar" name="registrar"><i class="fa fa-plus"></i><span class="ms-2">Registrar</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- encabezado de la tabla -->
        <h5 class="mb-3">Mis Ventas</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Fila eliminada exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Hubo un error eliminando la fila!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar mensaje de edicion exitosa -->
        <?php if (isset($_GET['actualizar'])) : ?>
            <?php
            if ($_GET['actualizar'] == 'exito'){

                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Fila editada correctamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    }
                    else{

                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Hubo un error editando la fila!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    }
        ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Numero de comprador</th>";
            echo "<th scope='col'>Id Cliente</th>";
            echo "<th scope='col'>Id producto</th>";
            echo "<th scope='col'>Id Sucursal</th>";
            echo "<th scope='col'>Numero de paquetes llevados</th>";
            echo "<th scope='col'>Fecha de compra</th>";
            echo "<th scope='col'>Ganancia total</th>";
            echo "<th scope='col'>Numero tarjeta</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_principal = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $anterior = $pagina - 1;
            $siguiente = $pagina + 1;

            $tabla = mysqli_query($db, "SELECT * FROM ventas");
            $filas = mysqli_num_rows($tabla);
            $paginas_totales = ceil($filas / $limite);

            $tabla_ventas = mysqli_query($db, "SELECT * FROM ventas LIMIT $pagina_principal, $limite");
            $num = $pagina_principal + 1;





            while ($ventas = mysqli_fetch_array($tabla_ventas)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $ventas['NumeroComprador'] . "</td>";
                echo "<td class='text-center'>" . $num++ . "</td>";
                echo "<td>" . $ventas['IDCliente'] . "</td>";
                echo "<td>" . $ventas['IDProducto'] . "</td>";
                echo "<td>" . $ventas['IDSucursal'] . "</td>";
                echo "<td>" . $ventas['NumeroPaquetesLlevados'] . "</td>";
                echo "<td>" . $ventas['FechaDeCompra'] . "</td>";
                echo "<td>" . $ventas['GananciaTotal'] . "</td>";
                echo "<td>" . $ventas['NumeroDeTarjeta'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary boton_editar pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // boton eliminar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger boton_eliminar pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($filas == 0) {
                echo "<p class='text-center'>No hay datos para mostrar</p>";
            } else {
                echo "<p>Total $filas entrada(s)</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$anterior'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $paginas_totales; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $paginas_totales) ? "href='?pagina=$siguiente'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editar_modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM ventas";
                    $query = mysqli_query($db, $sql);
                    $mahasiswa = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_idcliente" class="form-label">Id cliente</label>
                                <input type="text" name="edit_idcliente" id="edit_idcliente" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_idproducto" class="form-label">Id producto</label>
                                <input type="text" name="edit_idproducto" id="edit_idproducto" class="form-control" placeholder="" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_idsucursal" class="form-label">Id sucursal</label>
                                <input type="text" name="edit_idsucursal" id="edit_idsucursal" class="form-control" placeholder="" required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_numeropaquetesllevados" class="form-label">Numero de paquetes llevados</label>
                                <input type="text" name="edit_numeropaquetesllevados" id="edit_numeropaquetesllevados" class="form-control" placeholder="" required>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="edit_FechaDeCompra" class="form-label">Fecha de compra</label>
                                <input type="date" name="edit_FechaDeCompra" class="form-control" id="edit_FechaDeCompra" placeholder="" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_GananciaTotal" class="form-label">Ganancia total</label>
                                <input type="number" step=0.01 name="edit_GananciaTotal" id="edit_GananciaTotal" class=" form-control" placeholder="" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_NumeroDeTarjeta" class="form-label">Numero tarjeta</label>
                                <input type="number" step=0.01 name="edit_NumeroDeTarjeta" id="edit_NumeroDeTarjeta" class=" form-control" placeholder="" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_fila' class='btn btn-primary'>Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='borrar_modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='id_eliminar' id='id_eliminar'>
                            <p>Estas seguro que deseas eliminar este registro?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='eliminarfila' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('.boton_editar').on('click', function() {
                $('#editar_modal').modal('show');

                $tr = $(this).closest('tr');

                var fila = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(fila);
                $('#edit_id').val(fila[0]);
                $('#edit_idcliente').val(fila[2]);
                $('#edit_idproducto').val(fila[3]);
                $('#edit_idsucursal').val(fila[4]);
                $('#edit_numeropaquetesllevados').val(fila[5]);
                $('#edit_FechaDeCompra').val(fila[6]);
                $('#edit_GananciaTotal').val(fila[7]);
                $('#edit_NumeroDeTarjeta').val(fila[8]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.boton_eliminar').on('click', function() {
                $('#borrar_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id_eliminar').val(data[0]);
            });
        });
    </script>


</body>

</html>