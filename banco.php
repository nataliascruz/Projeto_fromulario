<?php

if (isset($_POST['cadastrar'])) {
    $primeiro_nome = $_POST['firstname'];
    $sobrenome = $_POST['lastname'];
    $email = $_POST['email'];
    $telefone = $_POST['number'];
    $senha = $_POST['password'];
    $genero = $_POST['gender'];
    $check_senha = $_POST['confirmpassword']; 

    // Verificação das senhas
    if ($senha != $check_senha) {
        die('As senhas não correspondem');
    }

    // Informações de conexão
    $host = "localhost";
    $banco = "formulário_cad"; 
    $user = "root";
    $senha_user = ""; 

    // Conexão com o banco de dados
    $con = mysqli_connect($host, $user, $senha_user, $banco);

    // Verificação de conexão
    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Ajuste o SQL para usar os nomes corretos das colunas em maiúsculas
    $sql = "INSERT INTO usuarios (PRIMEIRO_NOME, SOBRENOME, EMAIL, TELEFONE, SENHA, GENERO) 
            VALUES ('$primeiro_nome', '$sobrenome', '$email', '$telefone', '$senha', '$genero')";

    // Executar a consulta
    $rs = mysqli_query($con, $sql);

    // Verificação de sucesso na inserção
    if ($rs) {
        echo 'Você foi cadastrado com sucesso';
    } else {
        echo 'Erro ao cadastrar: ' . mysqli_error($con);
    }
}
    // Fechar a conexão
    mysqli_close($con);

?>
