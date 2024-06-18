<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Envio de Currículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Formulário de Envio de Currículo</h1>
        <form action="processa_formulario.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <div class="invalid-feedback">Por favor, insira seu nome.</div>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" required>
                <div class="invalid-feedback">Por favor, insira seu telefone.</div>
            </div>

            <div class="form-group">
                <label for="cargo_desejado">Cargo Desejado:</label>
                <input type="text" class="form-control" id="cargo_desejado" name="cargo_desejado" required>
                <div class="invalid-feedback">Por favor, insira o cargo desejado.</div>
            </div>

            <div class="form-group">
                <label for="escolaridade">Escolaridade:</label>
                <select class="form-control" id="escolaridade" name="escolaridade" required>
                    <option value="">Selecione</option>
                    <option value="Ensino Fundamental">Ensino Fundamental</option>
                    <option value="Ensino Médio">Ensino Médio</option>
                    <option value="Ensino Superior">Ensino Superior</option>
                    <option value="Pós-graduação">Pós-graduação</option>
                </select>
                <div class="invalid-feedback">Por favor, selecione sua escolaridade.</div>
            </div>

            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
            </div>

            <div class="form-group">
                <label for="arquivo">Envio de Arquivo (DOC, DOCX, PDF - Máx 1MB):</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo" required>
                <div class="invalid-feedback">Por favor, envie um arquivo válido.</div>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     
        (function() {
            'use strict';
            window.addEventListener('load', function() {
          
                var forms = document.getElementsByClassName('needs-validation');
  
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
