<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "E-mail já cadastrado!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);
        header("Location: ../public/login.html");
    }
}
?>
