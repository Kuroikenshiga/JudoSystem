<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/forms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div id="principal">
        
            <h1>Cadastro de Atleta</h1>
       
            <form>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome">
                </div>

                <div class="form-group">
                    <label for="faixa">Faixa</label>
                    <input type="text" class="form-control" id="faixa">
                </div>

                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <input type="text" class="form-control" id="genero">
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento">
                </div>

                <div class="form-group">
                    <label for="pontucao">Pontuação</label>
                    <input type="number" class="form-control" id="pontuacao">
                </div>

                <button type="button" class="btn btn-primary" onclick="insert()">Cadastrar</button>
                <a href="../../JudoSystem/view/listaAtletaView.php">lista</a>
                <a href="../../JudoSystem/view/updateAtletaView.php">update</a>
            </form>
        
    </div>
    <script src="../../JudoSystem/view/js/atletaAjax.js"></script>
</body>
</html>