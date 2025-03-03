<?php

session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        $em = 'Preencha todos os campos';
        header("Location: ../../index.php?error=$em");
        exit();
    } else {
        require '../conexao.php';
        $nome = mysqli_real_escape_string($conexao, $_POST['name']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $mensagem = mysqli_real_escape_string($conexao, $_POST['message']);
        $sql = "INSERT INTO `novos` (`id`, `nome`, `email`, `message`) VALUES (NULL, '$nome', '$email', '$mensagem'); ";
        mysqli_query($conexao, $sql);
        $sm = "Mensagem enviada com sucesso";
        header("Location: ../../index.php?success=$sm");
    }
}



