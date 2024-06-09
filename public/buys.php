<?php
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    <div class="titulo">
        <h1>Compras</h1>
    </div>
    <div class="contenedor">
        <h2>Mis compras</h2>
<?
if ($file) {
    $lines=$suma=0;
?>
<table class="tabla">
<?
    if (($fp=fopen('../files/'.$file, "r"))!==FALSE) {
        while (($data=fgetcsv($fp, 1000, ';'))!==FALSE) {
            $lines++;
            if ($lines==1) {
?>
    <thead>
        <tr>
            <th>Cod</th>
            <th>Descripcion</th>
            <th>Cant</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
<?
            } else {
                $importe=$data[2]*$data[3];
                $suma+=$importe;
?>
        <tr>
            <td><? echo $data[0]; ?></td>
            <td><? echo $data[1]; ?></td>
            <td align="right"><? echo $data[2]; ?></td>
            <td align="right"><? printf("%.2f", $data[3]); ?></td>
            <td align="right"><? printf("%.2f", $importe); ?></td>
        </tr>
<?
            }
        }
        fclose($fp);
?>
    </tbody>
    <tfoot>
        <tr>
            <td align="right" colspan="4">Total</td>
            <td align="right"><? printf("%.2f", $suma); ?></td>
        </tr>
    </tfoot>
</table>
<?
    }
}else {
?>
<div class="alert alert-danger" role="alert">
    No se ha cargado archivo
</div>
<?
}
?>
        <p class="parrafo">
            <a href="javascript:history.back()" class="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M10.78 19.03a.75.75 0 0 1-1.06 0l-6.25-6.25a.75.75 0 0 1 0-1.06l6.25-6.25a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L5.81 11.5h14.44a.75.75 0 0 1 0 1.5H5.81l4.97 4.97a.75.75 0 0 1 0 1.06Z"></path></svg>Volver</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>