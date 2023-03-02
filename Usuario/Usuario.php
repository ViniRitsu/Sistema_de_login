<?php 

class Usuario{

    public $msgerro = "";
    private $pdo;
    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgerro;

        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }
        catch(PDOException $e){
            $msgerro = $e->getMessage();
        }

    }
    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        // Verificar se ja esta cadastrado
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e"); // ver se o email ja esta cadastrado
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){ // rowCount() conta as linhas do banco de dados
            return false; // ja esta cadastrada
        }
        else{
            // Caso não, Cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios(nome,telefone,email,senha) VALUES (:n, :t, :e, :s )");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        } 
    }
    public function logar($email,$senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindParam(":e",$email);
        $sql->bindParam(":s",$senha);
        $sql->execute();
        if($sql->rowCount() > 0){
            // entrar no sistema (sessao)
            $dado = $sql->fetch(); // pega todo o conteudo do banco de dados e transforma em array
            session_start();
            $_SESSION['id'] = $dado['id'];// armazena  o id do usuario ne uma session 
            return true;
        }
        else
        {   
            echo "Ocorreu algum erro.";
            return false;// nao foi possivel logar
        }
    }
}
?>
