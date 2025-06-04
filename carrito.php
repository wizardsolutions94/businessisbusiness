<?php
include("admin/bd.php");
include("admin/templates/head1.php");

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito
if (isset($_POST['agregar'])) {
    $id = intval($_POST['producto_id']);
    $cantidad = intval($_POST['cantidad']);

    // Validar existencia del producto
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE ID = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$id] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $cantidad
            ];
        }
    }
    header("Location: carrito.php");
    exit;
}

// Eliminar un producto
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    unset($_SESSION['carrito'][$id]);
    header("Location: carrito.php");
    exit;
}

// Vaciar carrito
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4">Carrito de compras</h1>

    <?php if (empty($_SESSION['carrito'])): ?>
      <p>Tu carrito está vacío.</p>
    <?php else: ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($_SESSION['carrito'] as $id => $item):
              $subtotal = $item['precio'] * $item['cantidad'];
              $total += $subtotal;
          ?>
          <tr>
            <td><?= htmlspecialchars($item['nombre']) ?></td>
            <td><?= $item['cantidad'] ?></td>
            <td>$<?= number_format($item['precio'], 2) ?></td>
            <td>$<?= number_format($subtotal, 2) ?></td>
            <td><a href="?eliminar=<?= $id ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="3"><strong>Total:</strong></td>
            <td><strong>$<?= number_format($total, 2) ?></strong></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <a href="?vaciar=1" class="btn btn-outline-danger">Vaciar carrito</a>
      <a href="checkout.php" class="btn btn-primary">Finalizar compra</a>
    <?php endif; ?>
  </div>
</body>
</html>
