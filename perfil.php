<?php
include 'config.php';
header('Content-Type: application/json');

$usuario_id = $_SESSION['usuario_id'];
$stmt = $pdo->prepare("SELECT * FROM agendamentos WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
