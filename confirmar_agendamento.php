<?php
include 'config.php';

if (!isset($_SESSION['usuario_id']) || !$_SESSION['is_admin']) {
    header("Location: ../public/login.html");
    exit;
}

$id = $_GET['id'] ?? null;

if ($id) {
    // Atualiza o status de confirmação do agendamento
    $stmt = $pdo->prepare("UPDATE agendamentos SET confirmado = 1 WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(["status" => "success", "message" => "Agendamento confirmado!"]);
} else {
    echo json_encode(["status" => "error", "message" => "ID inválido"]);
}
?>
