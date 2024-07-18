<?php
    session_start();
    if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastrar Usuário</title>
    <style>
        body {
            background-image: url('https://i2.wp.com/giffiles.alphacoders.com/211/211748.gif');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            width: 800px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center p-3">CADASTRAR USUÁRIO</h2>
        <form method="post" action="../controller/usuarioController.php?action=cadastrarUsuario">
            <div class="m-3">
                <label for="nomeUsuario" class="form-label">Nome:</label>
                <input required type="text" id="nomeUsuario" name="nomeUsuario" class="form-control">
            </div>
            <div class="m-3">
                <label for="emailUsuario" class="form-label">E-mail:</label>
                <input required type="email" id="emailUsuario" name="emailUsuario" class="form-control">
            </div>
            <div class="m-3">
                <label for="loginUsuario" class="form-label">Login:</label>
                <input required type="text" id="loginUsuario" name="loginUsuario" class="form-control">
            </div>
            <div class="m-3">
                <label for="senhaUsuario" class="form-label">Senha:</label>
                <input required type="password" id="senhaUsuario" name="senhaUsuario" class="form-control">
            </div>
            <div class="m-3">
                <label for="telefoneCelular" class="form-label">Telefone:</label>
                <input required type="tel" id="telefoneCelular" name="telefoneCelular" class="form-control">
            </div>
            <div class="m-3">
                <label for="ativo" class="form-label">Ativo:</label>
                <select required id="ativo" name="ativo" class="form-control">
                    <option value="">Selecione uma opção</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>

            <div class="m-3" href="usuarios.php">
                <a class="btn btn-secondary mb-3">Voltar</a>
                <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if (isset($_GET['campoVazio'])) {
            echo "<script src='js/erro-vazio.js'></script>";
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('input[type="file"]').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagem').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
</body>

</html>
<?php
    } else {
        header('Location: index.php');
    }
?>