<?php
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinos</title>
    <link rel="stylesheet" href="../src/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../src/roboto.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="titulo">
        <h1>Wang Zhengwen</h1>
    </div>
    <div class="contenedor">
        <h2>Chinos</h2>
<?
if ($file) {
    $lines=$suma=0;
    if (($fp=fopen('../files/'.$file, "r"))!==FALSE) {
?>
<table class="tabla">
<?
        while (($data=fgetcsv($fp, 1000, ';'))!==FALSE) {
            $lines++;
            if ($lines==1) {
?>
    <thead>
        <tr>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Importe</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
<?
            }else {
                $importe=$data[1]*$data[2];
                $suma+=$importe;
?>
        <tr>
            <td><? echo $data[0];?></td>
            <td align="right"><? echo $data[1];?></td>
            <td align="right"><? printf("%.2f", $data[2]);?></td>
            <td align="right"><? printf("%.2f", $importe);?></td>
        </tr>
<?
            }
        }
        fclose($fp);
?>
    </tbody>
    <tfoot>
        <tr>
            <td align="right" colspan="3">Total</td>
            <td align="right"><? printf("%.2f", $suma);?></td>
        </tr>
    </tfoot>
</table>
<?
    }
}else {
?>
<p>No se selecciono ningún archivo</p>
<?
}
?>
        <p class="parrafo">
            <a href="javascript:history.back()" class="button">
                <span class="material-icons">
                    arrow_back_ios
                </span>Volver
            </a>
        </p>
    </div>
</body>
</html>