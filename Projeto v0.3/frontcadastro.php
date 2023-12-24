<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x=ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Painel de Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="./painel2.png" alt="">
        </div>
        <div class="form">
            <form action="backcadastro.php" method="post" id="cadastroForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="frontpontos.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="name">Nome</label>
                        <input id="name" type="name" name="name" placeholder="Primeiro e último nome" required>
                    </div>

                    <div class="input-box">
                        <label for="number">CPF</label>
                        <input id="number" type="text" name="number" placeholder="XXXXXXXXXXX" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua Senha" required>
                    </div>

                    <div class="input-box">
                        <label for="Confirmpassword">Confirme sua Senha</label>
                        <input id="Confirmpassword" type="password" name="Confirmpassword" placeholder="Digite sua Senha" required>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="continue-button">
                        <button type="button" id="submitButton"><a>Continuar</a></button>
                    </div>
                    <div class="infos">
                        <?php
                        if(isset($_GET['message']))
                        {
                            $message = $_GET['message'];
                            if ($message == 1){
                                echo "Cadastro realizado com sucesso!";
                            }
                            if ($message == 2){
                                echo "Erro ao cadastrar. Tente novamente.";
                            }
                            if ($message == 3){
                                echo "As senhas não coincidem. Tente novamente.";
                            }
                        
                        }
                        // MESMA COISA DO FRONTPONTOS.PHP
                        // pegar as coisas do backcadastro
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Adicionar evento de clique ao botão
        document.getElementById("submitButton").addEventListener("click", function() {
            // Enviar o formulário quando o botão for clicado
            document.getElementById("cadastroForm").submit();
        });
    </script>
</body>
</html>
