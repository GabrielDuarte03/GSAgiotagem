<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <form action="./operacoes/enviar-email.php" method="post">
    
    <label>Nome:</label>
    <input type="text" name="nome" id="nome">
    <br>
    <br>
    <label>Email:</label>
    <input type="text" name="email" id="email">
    <br>
    <br>
    <label>Assunto:</label>
    <input type="text" name="assunto" id="assunto">
    <br>
    <br>
    <label>Mensagem:</label>
    <textarea name="msg" id="msg" cols="30" rows="10"></textarea>
    <br>
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>

