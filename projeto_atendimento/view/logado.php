<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/e7/f9/f6/e7f9f6d7927fe7f3e9b165c9f8d0bd4a.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">ATENDIMENTOS</h1>
        <div class="btn-container">
            <a href="usuarios.php" class="btn btn-outline-dark">Gerenciar Usuários</a>
            <a href="atendimentos.php" class="btn btn-outline-dark">Gerenciar Atendimentos</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Você tem certeza?",
                text: "Não será possível reverter essa ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c00",
                cancelButtonColor: "#aaa",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, apagar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href =
                        `../controller/usuarioController.php?id=${id}&action=excluirUsuario`;
                }
            });
        }

        function confirmSair() {
            Swal.fire({
                title: "DESLOGAR!",
                text: "VOCÊ TEM CERTEZA?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#060",
                cancelButtonColor: "#aaa",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Deslogar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../controller/usuarioController.php?action=sair`;
                }
            });
        }
    </script>
</body>

</html>
