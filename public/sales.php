<?
$file=$_FILES['archivo']['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
    <div class="titulo">
        <h1>Buys</h1>
    </div>
    <div class="contenedor">
        <h2>My buys</h2>
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
            <th>Detail</th>
            <th>$/kg</th>
            <th>Weight</th>
            <th>$</th>
        </tr>
    </thead>
    <tbody>
<?
            }else {
                $suma+=$data[3];
?>
        <tr>
            <td><? echo $data[0]; ?></td>
            <td align="right"><? printf("%.2f", $data[1]); ?></td>
            <td align="right"><? printf("%.3f", $data[2]); ?></td>
            <td align="right"><? printf("%.2f", $data[3]); ?></td>
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
            <td align="right"><? printf("%.2f", $suma); ?></td>
        </tr>
    </tfoot>
</table>
<?
    }
}else {
?>
<div class="alert alert-danger">
    No se ha cargado un archivo
</div>
<?
}
?>
        <p class="parrafo">
            <a href="javascript:history.back()" class="button"><i data-feather="arrow-left"></i> Back</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>