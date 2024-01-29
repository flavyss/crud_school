<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('backend/conection/conection.php');

    if(isset($_POST["acao"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $sql->execute(array($email));

        $validate = $sql->fetchAll();

        if(count($validate) > 0){
            session_start();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE email=?");
            $sql->execute(array($email));
            $infos = $sql->fetchAll();

            foreach ($infos as $key => $info) {
                $_SESSION["id"] = $info["id"];
                $_SESSION["email"] = $info["email"];
                $_SESSION["nome"] = $info["nome"];
            }

            header('location: index.php');
        }

        else{
            echo "algo está errado";
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Document</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="KriptonFlavy">
    <meta name="Description" content="Site para meu portifolio cujo tema: uma Locadora de Carros">
    <meta name="keywords" content="site,portifolio,kripton,locadora,carros">

    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="src/css/effects.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c49e0b56e6.js" crossorigin="anonymous"></script>

</head>
<body>
    <section>
        <aside class="one">
            <div class="blur"></div>
            <div class="container">
                <h1>Bem Vindo</h1>
                <h2>Crie Sua Conta</h2>

                <div class="separate">
                    <div class="line"></div>
                    <div class="icon"><img src="src/images/Star 1.png" alt=""></div>
                    <div class="line"></div>
                </div>

                <button>Criar Conta</button>

                <a href="">Duvidas? Fale Conosco</a>

                <div class="separate2">
                    <div class="img"><img src="src/images/whatsapp.png" alt=""></div>
                    <div class="icon"><p style="font-weight: bolder;">ou</p></div>
                    <div class="img"><div class="box"><img class="cl" width="20" src="src/images/google.png" alt=""></div></div>
                </div>

            </div>
        </aside>

        <div class="bullet">
            <img src="src/images/vetor.png" alt="">
        </div>


        <aside class="two">

            <div class="logo">
                <img src="src/images/logo2.png" alt="">
            </div>
            <h1>Faça Login</h1>

            <form action="" method="post">
                <div class="w100">
                    <img src="src/images/user2.png" alt="">
                    <input type="text" name="email" placeholder="Usuário">
                </div>
                <div class="w100">
                    <img src="src/images/padlock.png" alt="">
                    <input type="password" name="senha" placeholder="Senha">
                </div>

                <div class="w100inp">
                    <div class="lembra">
                        <input type="checkbox" name="" id="">
                        <span>Lembrar</span>
                    </div>

                    <a href="">Esqueceu a senha?</a>
                </div>

                <div class="w100s">
                    <input type="submit" value="E n t r a r" name="acao">
                </div>
            </form>
        </aside>
    </section>
</body>
</html>