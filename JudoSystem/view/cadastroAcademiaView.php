<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../JudoSystem/view/css/forms.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body onload="promiseState()">
    <div id="principal">
       
            <form id="form">
                <div class="form-group">
                    <label for="numero">Número para contato</label>
                    <input type="text" class="form-control" id="numero"  placeholder="Número para contato">
                   
                </div>
                <div class="form-group">
                    <label for="Nome">Nome da academia</label>
                    <input type="text" class="form-control" id="nome"  placeholder="Número para contato">
                   
                </div>
                <div class="form-group">
                    <label for="estado">estado</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="estado">
                            <option selected>Selecione a unidade federal</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Número para contato</label>
                    <input type="text" class="form-control" id="numero"  placeholder="Número para contato">
                   
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
    </div>
    <script src="../../JudoSystem/apiRequestsJS/states.js"></script>
</body>
</html>