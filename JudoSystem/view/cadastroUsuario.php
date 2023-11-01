<!DOCTYPE html>
<html lang="en">
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body onload="promiseState()">
    <div id="principal">
        <div id="container">
            <div id="subContainer">
                <div id="logo" class="sonOfSubContainer"></div>
                <div id="form" class="sonOfSubContainer">
                    <img id="userAvatar" src="../../JudoSystem/view/svg/userAvatar.svg" alt="">
                    <h1 id="login">Me cadastrar</h1>
                    <form id="formulario" method="post">
                        <div class="control">
                            <span class="material-symbols-outlined">person</span>
                            <label for="userName">Nome de usuário</label><br>
                        </div>
                        <input type="text" name="usuario" id="userName"><br>
                        
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

                        <div class="control">
                            <span id="lock" class="material-symbols-outlined">lock</span>
                            <label for="passWord">Repita a senha</label><br>
                        </div>
                        <input type="password" name="senha" id="passWord"><br>
                        <button id="btnAction"  type="button" class="btn btn-success" onclick="insert()">Cadastrar</button>
                        <div id="cadLink"><a href="../../JudoSystem/view/loginView.php">Já tenho uma conta</a></div>
                    </form>
                    
                </div>
            </div>
            <h1>Cadastrar academia</h1>
            <form id="form">
                <div class="form-group">
                    <label for="numero">Número para contato</label>
                    <input type="text" class="form-control" id="numero"  placeholder="Número para contato">
                   
                </div>
                <div class="form-group">
                    <label for="Nome">Nome da academia</label>
                    <input type="text" class="form-control" id="nome"  placeholder="Nome">
                   
                </div>
                <div class="form-group">
                    <label for="estado">estado</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="estado" onchange="promiseCity()">
                            <option selected>Selecione a unidade federal</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade">cidade</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="cidade">Options</label>
                        </div>
                        <select class="custom-select" id="cidade" >
                            <option selected>Selecione a cidade</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro"  placeholder="Bairro">
                   
                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro"  placeholder="logradouro">
                   
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento"  placeholder="complemento">
                   
                </div>
               
            </form>
        
        </div>
    </div>
    <script src="../../JudoSystem/apiRequestsJS/states.js"></script>
    <script src="../../JudoSystem/view/js/academiaAjax.js"></script>
    <script src="../../JudoSystem/view//js/userAjax.js"></script>
</body>
</html>