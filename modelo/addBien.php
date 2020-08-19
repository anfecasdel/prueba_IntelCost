<?php
include 'conexion.php';

$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$telefono = $_POST["telefono"];
$postal = $_POST["postal"];
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];

$sql = "INSERT INTO misbienes VALUES('','$direccion','$ciudad','$telefono','$postal','$tipo','$precio')";
$con->query($sql);
?>

<script>
    alert("Bien guardado correctamente");
    window.location.href = '../index.php';
</script>