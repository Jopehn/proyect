<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La huerta</title>
    <link rel="stylesheet" href="../src/bootstrap.min.css">
    <link rel="stylesheet" href="../src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron bg-dark text-black">
                    <h1 class="display-4">La huerta</h1>
                    <p class="lead">JSON</p>
                </div>
                <div id="caja_titulo">
                    <div id="respuesta"></div>
                    <div id="btn_carga" class="btn btn-primary">Cargar JSON</div>
                </div>
                <div id="resultado"></div>
                <p>
                    <a href="javascript:history.back()" class="button"><i class="fa-solid fa-caret-left"></i>Volver</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../src/script.js"></script>
</body>
</html>