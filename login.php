<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['is_admin'] = $usuario['is_admin'];
        header("Location: ../public/index.html");
    } else {
        echo "Credenciais inválidas!";
    }
}
?>
