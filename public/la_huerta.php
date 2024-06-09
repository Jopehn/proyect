<?php
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La huerta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="titulo">
        <h1>La huerta</h1>
    </div>
    <div class="contenedor">
        <h2>La huerta de las mellis</h2>
<?
if ($file) {
    if (($fp=fopen('../files/'.$file, "r"))!==FALSE) {
        $lines=$suma=0;
?>
<table class="tabla">
<?
        while (($data=fgetcsv($fp, 1000, ';'))!==FALSE) {
            $lines++;
            if ($lines==1) {
?>
    <thead>
        <tr>
            <th>Cod</th>
            <th>Descripción</th>
            <th>Peso</th>
            <th>$/Kg</th>
            <th>$</th>
        </tr>
    </thead>
    <tbody>
<?
            }else {
                $suma+=$data[4];
?>
        <tr>
            <td><? echo $data[0];?></td>
            <td><? echo $data[1];?></td>
            <td align="right"><? printf("%.3f", $data[2]);?></td>
            <td align="right"><? printf("%.2f", $data[3]);?></td>
            <td align="right"><? printf("%.2f", $data[4]);?></td>
        </tr>
<?
            }
        }
?>
    </tbody>
    <tfoot>
        <tr>
            <td align="right" colspan="4">Total</td>
            <td align="right"><? printf("%.2f", $suma); ?></td>
        </tr>
    </tfoot>
</table>
<p class="parrafo">
    <a href="huerta.php?file=<? echo $file; ?>" class="button">Guardar</a>
    <a href="huerta_listado.php" class="button">Listado</a>
    <a href="huerta_json.php" class="button">Json</a>
</p>
<?
        fclose($fp);
    }
}else {
?>
<div class="alert alert-danger">
    No se selecciono archivo
</div>
<?
}
?>
        <p class="parrafo">
            <a href="javascript:history.back()" class="button"><i class="fa-solid fa-caret-left"></i>Volver</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>