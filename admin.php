<?php
include 'config.php';

if (!isset($_SESSION['usuario_id']) || !$_SESSION['is_admin']) {
    header("Location: ../public/login.html");
    exit;
}

header('Content-Type: application/json');

// Listar todos os agendamentos pendentes
$stmt = $pdo->prepare("SELECT ag.id, ag.veiculo, ag.data_agendamento, ag.hora_agendamento, ag.observacoes, 
                              us.nome AS usuario_nome, ag.confirmado 
                       FROM agendamentos ag 
                       JOIN usuarios us ON ag.usuario_id = us.id
                       WHERE ag.confirmado = 0");
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
