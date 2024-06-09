<?
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
if($file){
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
            <th>Cantidad</th>
            <th>Detalle</th>
            <th>Precio Unitario</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
<?
            } else {
                $importe=$data[0]*$data[2];
                $suma+=$importe;
?>
        <tr>
            <td align="right"><? echo $data[0]; ?></td>
            <td><? echo $data[1]; ?></td>
            <td align="right"><? printf("%.2f", $data[2]); ?></td>
            <td align="right"><? printf("%.2f", $importe); ?></td>
        </tr>
<?
            }
        }
?>
    </tbody>
    <tfoot>
        <tr>
            <td align="right" colspan="3">Total</td>
            <td align="right"><? printf("%.2f", $suma); ?></td>
        </tr>
    </tfoot>
</table>
<?
        fclose($fp);
    }
}else {
?>
<div class="alert alert-danger" role="alert">
    No se ha cargado ningún archivo
</div>
<?
}
?>
        <p class="parrafo"><a href="javascript:history.back()" class="button"><svg id="i-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M22 30 L6 16 22 2 Z" />
</svg>Volver</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>