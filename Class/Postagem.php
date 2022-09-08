<?php

class Postagem
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
        $sql = $this->pdo->prepare('SELECT * FROM postagens');

        // executar 
        $sql->execute();

        //retornar 
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

        public function cadastrar(Array $dados = null)
        {
            $id_usuario = $dados['id_usuario'];
            $descricao = $dados['descricao'];
            $dt = date('Y-m-d H:i');
            
            $sql = $this->pdo->prepare("INSERT INTO postagens
            (id_usuario,descricao,dt) VALUES (:id_usuario,:descricao,:dt)
            ");
            //mesclar dados ou tratar
            $sql->bindParam(':id_usuario',$id_usuario);
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt',$dt);

            //executar
            $sql->execute();
            return $this->pdo->LastInsertId();
        }
        public function atualizar(array $dados)
        {
            $descricao = $dados['descricao'];
            $dt = date('Y-m-d H:i');
            
            $sql = $this->pdo->prepare("UPDATE usuarios SET
                                    descricao= :descricao,
                                    dt = :dt
                                    WHERE
                                    id_postagem = :id_postagem
                                    LIMIT 1
                                    ");
            //mesclar dados ou tratar
            $sql->bindParam(':descricao',$descricao);

            $sql->bindParam(':dt',$dt);
            $sql->bindParam(':id_postagem',$dados['id_postagem']);


            //executar
            $sql->execute();  
        }
        public function apagar(int $id_postagem)
        {
            $sql = $this->pdo->prepare('DELETE FROM usuarios WHERE id_postagem = :id_postagem');
            $sql->bindParam(':id_postagem',$id_postagem);
            $sql->execute();

        }

public function mostrar(int $id_postagem)
{
    $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_postagem = :id_postagem");
    $sql->bindParam(':id_postagem',$id_postagem);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_OBJ);
}
/**
 * incrementa a contagem de gosteis 
 *
 */
public function gostei(int $id_postagem)
{
    $sql = $this->pdo->prepare('UPDATE postagens SET gostei = gostei++ 
    WHERE id_postagem = :id_postagem');
    $sql->bindParam(':id_postagem',$id_postagem);
    $sql->execute();
}
/**
 * incrementa a contagem de nao gosteis 
 *
 */
public function naogostei(int $id_postagem)
{
    $sql = $this->pdo->prepare('UPDATE postagens SET naogostei = naogostei++ 
    WHERE id_postagem = :id_postagem');
    $sql->bindParam(':id_postagem',$id_postagem);
    $sql->execute();
}

}





?>