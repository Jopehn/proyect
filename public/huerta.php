<?php
$file=$_GET['file'];
$sql="INSERT INTO compras (codigo, descripcion, peso, peso_kg, precio) VALUES (:codigo, :descripcion, :peso, :peso_kg, :precio)";
include 'conexion.php';
if ($file) {
    if (($fp=fopen('../files/'.$file, "r"))!==FALSE) {
        $lines=0;
        while (($data=fgetcsv($fp, 1000, ';'))!==FALSE) {
            $lines++;
            if ($lines>1) {
                $sth=$conn->prepare($sql);
                $sth->execute(array(':codigo'=>$data[0], ':descripcion'=>$data[1], ':peso'=>$data[2], ':peso_kg'=>$data[3], ':precio'=>$data[4]));
            }
        }
        fclose($fp);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La huerta</title>
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    <div class="titulo">
        <h1>La huerta</h1>
    </div>
    <div class="contenedor">
        <h2>La huerta de las mellis</h2>
        <p class="parrafo">
            Item guardado con exito
            <a href="javascript:history.back()" class="button">Volver</a>
        </p>
    </div>
</body>
</html>