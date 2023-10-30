<?php
include("./config.php");

if (isset($_POST['editar_fila'])) {
    $NumeroComprador = $_POST['edit_id'];
    $idcliente = $_POST['edit_idcliente'];
    $idproducto = $_POST['edit_idproducto'];
    $idsucursal = $_POST['edit_idsucursal'];
    $numeropaquetesllevados = $_POST['edit_numeropaquetesllevados'];
    $FechaDeCompra = $_POST['edit_FechaDeCompra'];
    $GananciaTotal = $_POST['edit_GananciaTotal'];
    $NumeroDeTarjeta = $_POST['edit_NumeroDeTarjeta'];


    $sql = "UPDATE ventas SET idcliente='$idcliente', idproducto='$idproducto', idsucursal='$idsucursal', numeropaquetesllevados='$numeropaquetesllevados', FechaDeCompra='$FechaDeCompra', GananciaTotal='$GananciaTotal', NumeroDeTarjeta='$NumeroDeTarjeta' WHERE NumeroComprador = '$NumeroComprador'";
    $consulta = mysqli_query($db, $sql);

    if ($consulta){
        header('Location: ./index.php?actualizar=exito');
    }
    else{
        header('Location: ./index.php?actualizar=error');
    }
} else
    die("Acceso Denegado...");
?>