<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/forms.css">
    <link href="../../JudoSystem/view/assets/css/style.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../JudoSystem/view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body onload="initializeForm()">
    <?php require_once('./JudoSystem/view/header.php') ?>
    <div id="principal">
        <h1>Informações da academia</h1>
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
                
                <button type="button" class="btn btn-primary" onclick="update()">Submit</button>
            </form>
        
    </div>
    <?php require_once('./JudoSystem/view/footer.php') ?>
    <script src="../../JudoSystem/apiRequestsJS/states.js"></script>
    <script src="../../JudoSystem/view/js/academiaAjax.js"></script>
</body>
</html>