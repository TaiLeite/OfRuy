<?php
include 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../public/login.html");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$veiculo = $_POST['veiculo'];
$data = $_POST['data_agendamento'];
$hora = $_POST['hora_agendamento'];
$observacoes = $_POST['observacoes'];

$stmt = $pdo->prepare("INSERT INTO agendamentos (usuario_id, veiculo, data_agendamento, hora_agendamento, observacoes)
                       VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$usuario_id, $veiculo, $data, $hora, $observacoes]);
header("Location: ../public/perfil.html");
?>
