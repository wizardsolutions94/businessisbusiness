<?php
include("admin/bd.php");

try {
    $stmt = $conexion->query("SELECT current_date");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "✅ Conexión exitosa. Fecha del servidor: " . $result['current_date'];
} catch (PDOException $e) {
    echo "❌ Error en consulta: " . $e->getMessage();
}
