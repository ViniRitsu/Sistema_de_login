<?php 
require_once "/wamp64/www/Codigos/sistema_de_login/Usuario/Usuario.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Estilo/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
  <div class="fundo">
   <div id="login">
    <form action="" method="POST">
      <h1 id="pri">Login</h1>
          <label for="exampleInputEmail1">
            Email
          </label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">
          <small id="emailHelp" class="form-text text-muted">
            Nunca compartilharemos seu E-mail com mais ninguém.
          </small>
            <label for="exampleInputPassword1">
              senha
            </label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
          <input id="acessar" name="acessar" type="submit" class="btn btn-primary" placeholder="Acessar ">
          <a href="Cadastro.php
          " target="_blank">Ainda não tem conta ?           <strong>
            Cadastre-se !
            </strong>
            </a>
      </form>
    </div>
  </div>
<?php 

if(isset($_POST['acessar']))
{
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  echo "$email";
  echo "$senha";
  if(!empty($email) && !empty($senha))
  { 

    $u->conectar("login_pessoas","Localhost","root","123456");

    if($msgerro == "")
    {
      if($u->logar($email, $senha))
      {
        header("location: painel.php");
      }
      else
      {
        echo "E-mail e/ou Senha estao incorretos. ";
      }
    }
    else
    {
      echo "ERRO:".$u->msgerro;
    }
  }
  else
  {
    
    echo "preencha todos os campos.";
  }
}
?>   
</body>
</html>