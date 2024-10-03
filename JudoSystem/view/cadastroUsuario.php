<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="../../JudoSystem/view/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../JudoSystem/view/css/cadastroForms.css">
</head>

<body onload="promiseState()">
    <div class="alert alert-success" id="alert" role="alert">
        <p id="msg">Por favor preencha todos os campos</p>
    </div>
    <div id="principal">

        <div id="container">

            <h2>Adesão de usuário</h2>
            <div id="cardsContainer">


                <div class="subContainer" id="left">

                    <div id="form" class="sonOfSubContainer">
                        <img class="svg" src="../../JudoSystem/view/svg/userAvatar.svg" alt="">
                        <h5 id="login">Dados pessoais</h5>
                        <form id="formulario" method="post">

                            <div class="control">
                                <span class="material-symbols-outlined">person</span>
                                <label for="userName">Nome de usuário</label><br>
                            </div>
                            <input type="text" class="validate" name="usuário" id="userName"><br>

                            <div class="control">
                                <span class="material-symbols-outlined">person</span>
                                <label for="email">Email</label><br>
                            </div>
                            <input type="text" class="validate" name="email" id="email"><br>

                            <div class="control">
                                <span id="lock" class="material-symbols-outlined">lock</span>
                                <label for="passWord">Senha</label><br>
                            </div>
                            <input type="password" class="validate" name="senha" id="passWord"><br>

                            <div class="control">
                                <span id="lock" class="material-symbols-outlined">lock</span>
                                <label for="RpassWord">Repita a senha</label><br>
                            </div>
                            <input type="password" class="validate" name="senha" id="RpassWord"><br>

                        </form>

                    </div>
                </div>
                <div class="subContainer" id="right">
                    <div id="form" class="sonOfSubContainer">
                        <img class="svg" src="../../JudoSystem/view/svg/academyAvatar.svg" alt="">
                        <h5>Informações da academia</h5>
                        <form id="formAcademy">

                            <div class="form-group">
                                <label for="numero">Número para contato</label>
                                <input type="text" class="form-control academyInput validate" id="numero" placeholder="Número para contato">

                            </div>
                            <div class="form-group">
                                <label for="Nome">Nome da academia</label>
                                <input type="text" class="form-control academyInput validate" id="nome" placeholder="Nome">

                            </div>
                            <div class="form-group">

                                <div class="input-group mb-3">

                                    <select class="custom-select validate" id="estado" onchange="promiseCity()">
                                        <option value="" selected>Selecione a unidade federal</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="input-group mb-3">

                                    <select class="custom-select validate" id="cidade">
                                        <option value="" selected>Selecione a cidade</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control academyInput validate" id="bairro" placeholder="Bairro">

                            </div>
                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control academyInput validate" id="logradouro" placeholder="logradouro">

                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control academyInput validate" id="complemento" placeholder="complemento">

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="footerContainer">
                <button id="btnAction" type="button" class="btn btn-success" onclick="insert()">Cadastrar</button>
                <div id="cadLink"><a href="../../JudoSystem/view/loginView.php">Já tenho uma conta</a></div>
            </div>
        </div>
    </div>
    <script src="../../JudoSystem/apiRequestsJS/states.js"></script>
    <script src="../../JudoSystem/view/js/academiaAjax.js"></script>
    <script src="../../JudoSystem/view//js/userAjax.js"></script>
    <script src="../../JudoSystem/view//js/animationsForms.js"></script>

</body>

</html>