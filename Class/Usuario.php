<?php

class Usuario extends Conexao
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conexao();
    }
    
    public function listar()
    {
        //abrir a conexao com o banco de dados
        // montar a consulta 
        $sql = $this->pdo->prepare('SELECT * FROM usuarios');

        // executar 
        $sql->execute();

        //retornar 
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

        public function cadastrar(Array $dados = null)
        {
            $nome = trim(strtoupper($dados['nome']));
            $email = trim(strtoupper($dados['email']));
            $senha = md5($dados['senha']);
            
            $sql = $this->pdo->prepare("INSERT INTO usuarios
            (nome,email,senha) VALUES (:nome,:email,:senha)
            VALUES
            (:nome, :email, :senha)
            ");
            //mesclar dados ou tratar
            $sql->bindParam(':nome',$dados['nome']);
            $sql->bindParam(':email',$dados['email']);
            $sql->bindParam(':senha',$dados['senha']);

            //executar
            $sql->execute();
            return $this->pdo->LastInsertId();
        }
        public function atualizar(array $dados)
        {
            $nome = trim(strtoupper($dados['nome']));
            $email = trim(strtoupper($dados['email']));
            $senha = md5($dados['senha']);
            
            $sql = $this->pdo->prepare("UPDATE usuarios SET
                                    nome= :nome,
                                    email = :email,
                                    senha = :senha
                                    WHERE
                                    id_usuario = :id_usuario
                                    LIMIT 1
                                    ");
            //mesclar dados ou tratar
            $sql->bindParam(':nome',$nome);
            $sql->bindParam(':email',$email);
            $sql->bindParam(':senha',$senha);
            $sql->bindParam(':id_usuario',$dados['id_usuario']);


            //executar
            $sql->execute();  
        }
        public function apagar(int $id_usuario)
        {
            $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id_usuario = :id_usuario');
            $sql->bindParam(':id_usuario',$id_usuario);
            $sql->execute();

        }

public function mostrar(int $id_usuario)
{
    $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
    $sql->bindParam(':id_usuario',$id_usuario);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_OBJ);
}


}




?>