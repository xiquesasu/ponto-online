<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Controle de Ponto</title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="./painel2.png" alt="">
        </div>
        <div class="form">
            <form action="backpontos.php" method="post" id="batepontoForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Controle de Ponto </h1>
                    </div>
                    <div class="login-button">
                        <button><a href="frontcadastro.php">Cadastre-se</a></button>
                    </div>
                </div>
                <div class="form-body">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" required>
                    <br>
                    <br>
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <br>
                    <div class="login-button">
                        <button type="button" id="submitButton"><a>Entrar</a></button>
                        </div>
                    <br>
                    <br>
                    <br>
                    <div class="infos">
                        <?php
                            date_default_timezone_set('America/Sao_Paulo');
                            if(isset($_GET['message']))
                            {
                                $message = $_GET['message'];
                                if ($message == 1){
                                    echo "Entrada Realizada " .date("d/m/y h:i:s");
                                }
                                if ($message == 2) {
                                    echo "Saída Realizada " .date("d/m/y h:i:s");
                                }
                                if ($message == 3){
                                    echo "Houve um erro no banco de dados";
                                }
                                if ($message == 4){
                                    echo "Usuário não encontrado, CPF ou Senha incorretos";
                                }
                            }
                        ?>
                        <h3>Chegada:</h3>
                    </div>
                    <br>
                    <br>
                    <div class="infos">
                        <h3>Saída:</h3>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Adicionar evento de clique ao botão
        document.getElementById("submitButton").addEventListener("click", function() {
            // Enviar o formulário quando o botão for clicado
            document.getElementById("batepontoForm").submit();
        });

        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); /* Impede o envio do formulário*/

            /* Verifica as credenciais do usuário*/
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            /* Verifica se o usuário é "admin" e a senha é "password" */
            if (username === 'admin' && password === 'password') {
                alert('Login bem-sucedido!');
                
            } else {
                alert('Credenciais inválidas. Tente novamente.');
            }
        });
    </script>
</body>
</html>