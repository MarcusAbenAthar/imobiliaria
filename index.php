<?php
require_once "variaveis_controles.php";
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css próprio -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>
        <?php
        if (isset($_POST['pagina'])) {
            switch ($_POST['pagina']) {
                case 'cadUsuario':
                    echo 'Cadastro de Usuários';
                    break;
                case 'cadImovel':
                    echo 'Cadastro de Imóveis';
                    break;
                case 'listUsuario':
                    echo 'Lista de Usuários';
                    break;
                case 'listImoveis':
                    echo 'Lista de Imóveis';
                    break;
                case 'inicio':
                    echo 'Início';
                    break;
            }
        } else if (isset($_POST['editUsuario'])) {
            echo "Editar Usuário";
        } else if (isset($_POST['editImovel'])) {
            echo "Editar Usuário";
        } else {
            echo "Início";
        }
        ?>
    </title>
</head>

<body>
    <?php
    require_once './acao.php';
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="assets/js/javascript.js"></script>

</html>