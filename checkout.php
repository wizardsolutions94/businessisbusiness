<?php
include("admin/bd.php");
include("admin/templates/head1.php"); // Cambia a PostgreSQL si ya migraste

// Verifica si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "Tu carrito está vacío.";
    exit;
}

// (Opcional) Cliente genérico para pruebas (ID = 1)
$cliente_id = 1;

// Calcular total
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}

// 1. Crear orden
$stmt = $pdo->prepare("INSERT INTO ordenes (cliente_id, total, estado) VALUES (?, ?, ?)");
$stmt->execute([$cliente_id, $total, 'pendiente']);
$orden_id = $pdo->lastInsertId();

// 2. Insertar productos de la orden
$stmt_detalle = $pdo->prepare("INSERT INTO detalle_orden (orden_id, producto_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");

foreach ($_SESSION['carrito'] as $producto_id => $item) {
    $stmt_detalle->execute([$orden_id, $producto_id, $item['cantidad'], $item['precio']]);
}

// 3. Vaciar el carrito
unset($_SESSION['carrito']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Compra realizada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="alert alert-success">
      <h4 class="alert-heading">¡Compra realizada con éxito!</h4>
      <p>Tu número de orden es: <strong>#<?= $orden_id ?></strong></p>
      <hr>
      <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    </div>
  </div>
</body>
</html>
