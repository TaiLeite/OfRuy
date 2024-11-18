<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM agendamentos");
$agendamentos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Agendamentos</title>
<link rel="stylesheet" href="../public/styles.css">
</head>
<body>
    <h2>Agendamentos</h2>
    <table>
        <tr>
            <th>Veículo</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Observações</th>
            <th>Confirmado</th>
        </tr>
        <?php foreach ($agendamentos as $agendamento): ?>
        <tr>
            <td><?= htmlspecialchars($agendamento['veiculo']) ?></td>
            <td><?= htmlspecialchars($agendamento['data_agendamento']) ?></td>
            <td><?= htmlspecialchars($agendamento['hora_agendamento']) ?></td>
            <td><?= htmlspecialchars($agendamento['observacoes']) ?></td>
            <td><?= $agendamento['confirmado'] ? 'Sim' : 'Não' ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
