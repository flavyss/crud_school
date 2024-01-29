<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

    require_once('backend/conection/conection.php');
    require_once('backend/verify.php');

    $nome = $_SESSION['nome'];

    if(isset($_POST["acao"])){
        
        $nome_funcionario = $_POST["nome"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $cargo = $_POST["cargo"];
        $salario = $_POST["salario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"]=

        $sql = $pdo->prepare('INSERT INTO Funcionarios VALUES (null, ?, ?, ?, ?, ?, ?, ?)');

        if ($sql->execute(array($nome_funcionario,$rg,$cpf,$cargo,$salario,$email,$senha))) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Não foi possivel executar a ação" . $sql->errorInfo()[2];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>olá, <?php echo $nome; ?> </h1>
    <a href="backend/logout.php">logout</a>

    <h2>Cadastro de funcionários</h2>

    <form action="" method="post">

    <h2>Dados Pessoais</h2>
    <label for="nome">Nome completo:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="rg">Número de Identidade (RG):</label>
    <input type="text" id="rg" name="rg">

    <label for="cpf">Número de CPF:</label>
    <input type="text" id="cpf" name="cpf">


    <h2>Informações de Contrato</h2>

    <label for="cargo">Cargo:</label>
    <input type="text" id="cargo" name="cargo">

    <label for="salario">Salário:</label>
    <input type="text" id="salario" name="salario">


    <h2>Acesso do funcionario</h2>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email">

    <label for="email">Senha:</label>
    <input type="password" id="senha" name="senha">

    <input type="submit" value="Enviar" name="acao">

</form>

</body>
</html>