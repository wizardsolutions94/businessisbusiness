<?php 
$host = "dnavmctpafidawsfqfoa.supabase.co";
$port = "5432";
$dbname = "website";
$usuario = "website";
$contrasenia = "LnWEzj4XVaxnxLRO";

try {
    $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET NAMES 'UTF8'");
} catch (PDOException $error) {
    echo "Error de conexión: " . $error->getMessage();
    die();
}
?>
