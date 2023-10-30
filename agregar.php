<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['registrar'])) {
    // ambil data dari form
    $idcliente = $_POST['idcliente'];
    $idproducto = $_POST['idproducto'];
    $idsucursal = $_POST['idsucursal'];
    $numeropaquetesllevados = $_POST['numeropaquetesllevados'];
    $FechaDeCompra = $_POST['FechaDeCompra'];
    $GananciaTotal = $_POST['GananciaTotal'];
    $NumeroDeTarjeta = $_POST['NumeroDeTarjeta'];

    // query
    $sql = "INSERT INTO ventas(IDCliente, IDProducto, IDSucursal, NumeroPaquetesLlevados, FechaDeCompra, GananciaTotal, NumeroDeTarjeta)
    VALUES('$idcliente', '$idproducto', '$idsucursal', '$numeropaquetesllevados', '$FechaDeCompra', '$GananciaTotal','$NumeroDeTarjeta')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?agregar=exito');
    else
        header('Location: ./index.php?agregar=error');
} else
    die("Acceso denegado...");
