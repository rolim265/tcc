<?php include('menu.php'); ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include_once 'sendmail.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Código fonte formulário PHP">
    <meta name="keywords" content="formulário PHP, bootstrap, bootstrap validator">
    <meta name="author" content="wise wallet">

    <title>| Formulário PHP</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
    <style>
        main, footer, .mensagem-alerta {
            text-align: center;
        }
        form {
            max-width: 800px;
            padding-top: 30px;
            margin: 0 auto;
        }
        .mensagem-alerta {
            max-width: 500px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Formulário de Contato</h1>
        <p>Acrescente um email válido para receber o email teste!</p>
        <br>
        <form class="form-horizontal" action="contato.php#formulario" method="post" role="form" data-toggle="validator">
            <div class="form-group">
                <label class="control-label col-sm-3" for="nome">Nome*:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email*:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@dominio.com" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="telefone">Telefone*:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="assunto">Assunto*:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="assunto" required>
                        <option value="" selected disabled>-- Escolha uma opção --</option>
                        <option value="contato">Contato</option>
                        <option value="financeiro">Financeiro</option>
                        <option value="informacoes">Informações</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="mensagem">Mensagem*:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="6" id="mensagem" name="mensagem" placeholder="Sua mensagem" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary" name="btnSend">ENVIAR</button>
                    <a name="formulario"></a>
                    <div class="mensagem-alerta"><?php echo $msg ?? ''; ?></div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <hr>
        <!-- <div class="copyright">Desenvolvido com ❤ por
            <a href="https://cristianefaria.com" target="_blank">CRISTIANE FARIA</a>
        </div> -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</body>
</html>
