<?php
try {
    $conn=new PDO("mysql:host=localhost; dbname=test", "root", "");
} catch (PDOException $e) {
    echo 'Falló la conexion: ' . $e->getMessage();
}
?>