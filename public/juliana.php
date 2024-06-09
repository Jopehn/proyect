<?php
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juliana</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-light bg-dark">
                    <h1 class="display-4">Juliana compras</h1>
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
            <th>Cantidad</th>
            <th>Descrripción</th>
            <th>P. Unit.</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
<?
            }else {
                $importe=$data[0]*$data[2];
                $suma+=$importe;
?>
        <tr>
            <td align="right"><? echo $data[0]; ?></td>
            <td><? echo strtoupper($data[1]); ?></td>
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
<div class="alert alert-danger">
    No se selecciono un archivo
</div>
<?
}
?>
                <p><a href="javascript:history.back()" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i>Volver</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>