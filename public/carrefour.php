<?php
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrefour</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/roboto.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="p-5 text-center bg-dark text-light rounded-3">
                    <h1 class="text-body-emphasis">Carrefour</h1>
                    <p class="lead">Listado de compras</p>
                </div>
<?
if ($file) {
    if (($fp=fopen('../files/'.$file, "r"))!==FALSE) {
        $lines=$suma=0;
?>
<table class="table table-bordered table-striped">
<?
        while (($data=fgetcsv($fp, 1000, ';'))!==FALSE) {
            $lines++;
            if ($lines==1) {
?>
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
<?
            }else {
                $importe=$data[1]*$data[2];
                $suma+=$importe;
?>
        <tr>
            <td><? echo strtoupper($data[0]); ?></td>
            <td><? echo $data[1]; ?></td>
            <td align="right"><? printf("%.2f", $data[2]); ?></td>
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
<div class="alert alert-danger">No se ha seleccionado el archivo</div>
<?
}
?>
                <p><a href="javascript:history.back()" class="btn btn-light">Volver</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>