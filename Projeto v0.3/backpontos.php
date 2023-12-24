<?php
// Definir o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados de conexão com o banco de dados SQLite3
    $dbPath = "./DB/db_pontos.db";

    // Dados do formulário
    $cpf = $_POST["cpf"];
    $password = $_POST["password"];
    $entrada = date("d-m-Y H:i:s"); // Obtém a data e hora atual

    // Conectar ao banco de dados SQLite3
    $db = new SQLite3($dbPath);

    // Verificar se a conexão foi estabelecida com sucesso
    if (!$db) {
        die("Erro ao conectar ao banco de dados.");
    }

    // Consulta SQL para verificar os dados do usuário
    $sql = "SELECT cpf, senha FROM usuarios WHERE cpf = '$cpf' AND senha = '$password'";

    // Executar a consulta SQL
    $result = $db->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($result && $result->fetchArray()) {
        //echo "Existe no banco de dados!";
        $sql = "SELECT cpf, entrada FROM temp WHERE cpf = '$cpf'"; // Verifica se usuario já deu entrada
        $result = $db->query($sql);
        if ($result && $row = $result->fetchArray()) {
            $cpf = $row['cpf'];
            $entrada = $row['entrada'];
            $saida = date("d-m-Y H:i:s"); // Obtém a data e hora atual
            $sql = "INSERT INTO pontos (cpf, entrada, saida) VALUES ('$cpf', '$entrada', '$saida')";
            if ($db->exec($sql)) {
                //echo "Registro inserido com sucesso!";
                $sql = "DELETE FROM temp WHERE cpf = '$cpf'";
                if ($db->exec($sql)) {
                    //echo "Registro removido da tabela 'temp'!";
                    header("Location:frontpontos.php?message=2"); //Faz o usuário retorna a mesma página MUDAR PARA HEADER
                } else {
                    //echo "Erro ao remover registro da tabela 'temp'."; message == 3
                    header("Location:frontpontos.php?message=3");
                }
            } else {
                //echo "Erro ao inserir registro na tabela 'pontos'."; // message == 3
                header("Location:frontpontos.php?message=3");
            }
        } else {
            $sql = "INSERT INTO temp (cpf, entrada) VALUES ('$cpf', '$entrada')";
            if ($db->exec($sql)) {
                //echo "Registro inserido com sucesso na tabela 'temp'!";
                header("Location:frontpontos.php?message=1");
            } else {
                //echo "Erro ao inserir registro na tabela 'temp'."; // message == 3
                header("Location:frontpontos.php?message=3");
            }
        }
    } else {
        //echo "Não foi encontrado no banco de dados. Tente novamente."; // message == 3
        header("Location:frontpontos.php?message=4");
    }

    // Fechar a conexão com o banco de dados
    $db->close();
}
?>