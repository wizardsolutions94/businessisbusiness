<?php
include("admin/bd.php");
include("admin/templates/head1.php");

$mensaje = "";

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $correo = $_POST["correo"] ?? '';
    $telefono = $_POST["telefono"] ?? '';
    $direccion = $_POST["direccion"] ?? '';

    if ($nombre && $correo) {
        // Verificar si el correo ya está registrado
        $stmt = $pdo->prepare("SELECT ID FROM clientes WHERE correo = ?");
        $stmt->execute([$correo]);

        if ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['cliente_id'] = $cliente['ID'];
            $mensaje = "Ya estabas registrado. Has sido identificado correctamente.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO clientes (nombre_completo, correo, telefono, direccion) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $correo, $telefono, $direccion]);
            $cliente_id = $pdo->lastInsertId();

            $_SESSION['cliente_id'] = $cliente_id;
            $mensaje = "¡Registro exitoso! Ahora puedes continuar con tu compra.";
        }
    } else {
        $mensaje = "Por favor completa los campos obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">Registro de Cliente</h2>

    <?php if ($mensaje): ?>
      <div class="alert alert-info"><?= $mensaje ?></div>
      <a href="carrito.php" class="btn btn-success mt-3">Ir al carrito</a>
    <?php else: ?>
      <form method="POST">
        <div class="mb-3">
          <label>Nombre completo *</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Correo electrónico *</label>
          <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Teléfono</label>
          <input type="text" name="telefono" class="form-control">
        </div>
        <div class="mb-3">
          <label>Dirección</label>
          <textarea name="direccion" class="form-control" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
