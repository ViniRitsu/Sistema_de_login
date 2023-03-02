<?php 
require_once "Usuario/Usuario.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="Estilo/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
  <div class="fundo">
   <div id="login">
    <form method="post">
      <h1 id="pri">Cadastro</h1>
      <label for="exampleInputEmail1">
            Nome
          </label>
          <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="nome"  name="nome" maxlength="30">
            <label for="exampleInputPassword1">
              Telefone
            </label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefone" name="telefone"
          maxlength="40">
          <label for="exampleInputEmail1">
            Email
          </label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"  name="email" maxlength="30">
          <small id="emailHelp" class="form-text text-muted">
            Nunca compartilharemos seu E-mail com mais ninguém.
          </small>
          <label for="exampleInputPassword1">
              Senha
            </label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha"
          maxlength="15">
          <label for="exampleInputPassword1">
              Confirmar Senha
            </label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmar Senha" name="confsenha"
          maxlength="15">
          <input id="acessar" type="submit" class="btn btn-primary" placeholder="Acessar" name="acessar">
      </form>
    </div>
  </div>
<?php 
// verificar se a pessoa clicou no botao
if(isset($_POST['nome']))
{
  $nome = addslashes($_POST['nome']);
  $telefone = addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarsenha = addslashes($_POST['confsenha']);
}
// verificar se esta tudo preenchido
if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha))
{

  $u->conectar("login_pessoas","Localhost","root","123456");
  if($u->msgerro == "")
  { // esta tudo ok
    if($senha == $confirmarsenha)
    {
      if($u->cadastrar($nome, $telefone, $email, $senha))
      {
        echo"cadastrado com sucesso acesse para entrar";
      }
      else
      {
        echo "Email ja esta cadastrado!";
      }
    }
    else
    {
      echo "Senha e Confirmar Senha não correspondem.";
    }
  }
  else
  {
    echo "ERRO:".$u->msgerro;
  } 
}
else
{
  echo "preencha todos os campos";
}    
?>
</body>
</html>