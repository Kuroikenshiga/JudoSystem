<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div id="principal">
        <div id="container">
            <div class="subContainer">
                <div id="logo" class="sonOfSubContainer"></div>
                <div id="form" class="sonOfSubContainer">
                    <img id="userAvatar" src="../../JudoSystem/view/svg/userAvatar.svg" alt="">
                    <h1 id="login">Bem Vindo</h1>
                    <form id="formulario" method="post">
                        
                        <div class="control">
                            <span class="material-symbols-outlined">person</span>
                            <label for="email">Email</label><br>
                        </div>
                        <input type="text" name="email" id="email"><br>

                        <div class="control">
                            <span id="lock" class="material-symbols-outlined">lock</span>
                            <label for="passWord">Senha</label><br>
                        </div>
                        <input type="password" name="senha" id="passWord"><br>
                        
                        <button id="btnAction" type="button" class="btn btn-success" onclick="login()">Entrar</button>
                        <div id="cadLink"><a href="../../JudoSystem/view/cadastroUsuario.php">Me cadastrar</a></div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="../../JudoSystem/view//js/userAjax.js"></script>
</body>
</html>