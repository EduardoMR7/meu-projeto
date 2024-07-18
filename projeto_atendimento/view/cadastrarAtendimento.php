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
    <title>Cadastrar Atendimento</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/8e/14/55/8e145599d4847e339828787162952035.gif');
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
        <h2 class="text-center p-3">CADASTRAR ATENDIMENTO</h2>
        <form method="post" action="../controller/atendimentoController.php?action=cadastrarAtendimento">
            <div class="m-3">
                <label for="idFormaAtendimento" class="form-label">Forma de Atendimento:</label>
                <select required id="idFormaAtendimento" name="idFormaAtendimento" class="form-control">
                    <option value="">Selecione uma forma de atendimento</option>
                    <?php
                    require_once('../controller/formaAtendimentoController.php');
                    $FormaAtendimentoController = new FormaAtendimentoController();
                    $consulta = $FormaAtendimentoController->consulta();
                    foreach ($consulta as $linha) {
                        $idFormaAtendimento = $linha['idFormaAtendimento'];
                        $nomeAtendimento = $linha['nomeAtendimento'];
                        echo "<option value='$idFormaAtendimento'>$nomeAtendimento</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="m-3">
                <label for="idUsuario" class="form-label">Usuário:</label>
                <select required id="idUsuario" name="idUsuario" class="form-control">
                    <option value="">Selecione um usuário</option>
                    <?php
                    require_once('../controller/usuarioController.php');
                    $UsuarioController = new UsuarioController();
                    $consulta = $UsuarioController->consulta();
                    foreach ($consulta as $linha) {
                        $idUsuario = $linha['idUsuario'];
                        $nomeUsuario = $linha['nomeUsuario'];
                        echo "<option value='$idUsuario'>$nomeUsuario</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="m-3">
                <label for="ativo" class="form-label">Ativo:</label>
                <select required id="ativo" name="ativo" class="form-control">
                    <option value="">Selecione uma opção</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <div class="m-3">
                <label for="respostaAtendimento" class="form-label">Resposta do Atendimento:</label>
                <textarea required id="respostaAtendimento" name="respostaAtendimento" class="form-control"></textarea>
            </div>

            <div class="m-3 d-flex justify-content-between">
                <a href="atendimentos.php" class="btn btn-secondary mb-3">Voltar</a>
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
</body>

</html>
<?php
} else {
    header('Location: index.php');
}
?>
