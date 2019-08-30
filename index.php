<?php

// Importando dependências
require(__DIR__.'/vendor/autoload.php');

// Declaração de uso da classe
use \Bissolli\ValidadorCpfCnpj\CPF;
use \Bissolli\ValidadorCpfCnpj\CNPJ;

$mostrarmensagem = null;

// Verificando se o formulário foi enviado
if($_POST){

    // Pegando o CPF do POST
    $cpfUser = $_POST['validadorCPF'];
    // Criando objeto da Classe CPF
    $cpf = new CPF($cpfUser);

    // Verifica se é um número válido de CPF
    // Retorna true/false
    if($cpf->isValid()){
        $msg ='CPF é válido!!!';
        $mostrarmensagem = true;
    } else {
        $msg = 'INVALIDOOO!!!!';
        $mostrarmensagem = false;
    }

    // Determinando o valor padrão do cpf
    $padrao = $_POST['validadorCPF'];

} else {
    $msg = '';
    $padrao = '';
    $mostrarmensagem = null;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container p-5">
        <form action="" method="post">
            <div class="form-group bg-light p-5 border border-dark">
                <p class="display-1 bg-light">Validador CPF</p>
                <label for="validadorCPF">Digite seu CPF</label>
                <input value="<?= $padrao ?>" type="text" class="form-control" name="validadorCPF" id="validadorCPF" aria-describedby="validadorCPF" placeholder="Digite seu cpf">
                <small id="emailHelp" class="form-text text-muted">Nós nunca vamos compartilhar seu cpf com ninguém.</small>
                <button type="submit" class="btn btn-primary">Validar</button>
            </div>
        </form>
        
        <?php if($mostrarmensagem) {?>
            <div class="alert alert-success fixed-top" role="alert">
            <span class="text-center"><?= $msg ?></span>
            </div>
        <?php } elseif($mostrarmensagem = null) {
            
        } else { ?>
            <div class="alert alert-danger fixed-top" role="alert">
            <span class="text-center"><?= $msg ?></span>
            </div>
        <?php } ?>
    </div>

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>