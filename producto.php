<?php
include("admin/bd.php");
include("admin/templates/head1.php"); // Cambia a PostgreSQL si es necesario

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $pdo->prepare("SELECT * FROM productos WHERE ID = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($producto['nombre']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <img src="admin/img/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h1><?= $producto['nombre'] ?></h1>
        <p><?= $producto['descripcion'] ?></p>
        <h3>$<?= number_format($producto['precio'], 2) ?></h3>
        <form action="carrito.php" method="POST">
          <input type="hidden" name="producto_id" value="<?= $producto['ID'] ?>">
          <label>Cantidad:</label>
          <input type="number" name="cantidad" value="1" min="1" class="form-control w-25 mb-3">
          <button type="submit" name="agregar" class="btn btn-success">Agregar al carrito</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
