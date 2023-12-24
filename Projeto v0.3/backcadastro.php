<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados de conexão com o banco de dados SQLite3
    $dbPath = "./DB/db_pontos.db";

    // Dados do formulário
    $name = $_POST["name"];
    $number = $_POST["number"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["Confirmpassword"];

    // Verificar se as senhas coincidem
    if ($password == $confirmpassword) {
        // Conectar ao banco de dados SQLite3
        $db = new SQLite3($dbPath);

        // Verificar se a conexão foi estabelecida com sucesso
        if (!$db) {
            //die("Erro ao conectar ao banco de dados."); // message == 2
            header("Location:frontcadastro.php?message=2");
        }

        // Consulta SQL para inserir os dados do formulário
        $sql = "INSERT INTO usuarios (nome, cpf, senha) VALUES ('$name', '$number', '$password')";

        // Executar a consulta SQL
        if ($db->exec($sql)) {
            //echo "Cadastro realizado com sucesso!"; MUDAR PARA HEADER message == 1
            header("Location:frontcadastro.php?message=1");
        } else {
            //echo "Erro ao cadastrar. Tente novamente."; // message == 2
            header("Location:frontcadastro.php?message=2");
        }

        // Fechar a conexão com o banco de dados
        $db->close();
    } else {
        //echo "As senhas não coincidem. Tente novamente."; message == 3
        header("Location:frontcadastro.php?message=3");
    }
}
?>