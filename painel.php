<?php 
    session_start();
    if(isset($_SESSION['id']))
    {
        header("location: ./login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>painel</title>
</head>
<body>
  <h1>Ola seja bem vindo</h1>  
  <a href="sair.php
  ">sair</a>
</body>
</html>
