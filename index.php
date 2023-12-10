<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Enviando SMS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script>
        $("#tel").mask("(00) 00000-0000");
    </script>
</head>
<body>
    <div class="formulario">
        <p>Enviar Mensagem</p>
            <form action="" method="post">
                <?php
                $sms = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if(isset($sms['sendSms'])){
                        unset($sms['sendSms']);
                        /*var_dump($sms);
                        echo "<p>OK</p>";*/
                        $mensagem = urlencode($sms['msg']);
                        $url_api = "https://api.iagentesms.com.br/webservices/http.php?metodo=envio&usuario={$sms['email']}&senha={$sms['senha']}&celular={$sms['fone']}&mensagem=($mensagem)";
                        
                        $resposta = file_get_contents($url_api);

                        echo "<strong> {$resposta} </strong>";
                    }        
                ?>
                <br>
                <span style="color:#fff" >Telefone:</span>
                <input type="text" name="fone" id="tel" placeholder="Adicione o telefone com DD">
                <span style="color:#fff" >E-mail:</span>
                <input type="email" name="email" placeholder="Adicione seu e-mail">
                <span style="color:#fff" >Senha:</span>
                <input type="password" name="senha" placeholder="Adicione sua senha">
                <span style="color:#fff" >Mensagem:</span>
                <textarea name="msg" cols="30" rows="5">Digite uma Mensagem</textarea>
                <button type="submit" name="sendSms">Enviar</button>
            </form>
    </div>  
</body>
</html>