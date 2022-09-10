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

         public function cadastrar(Array $dados = null, $foto)
         {

           // print_r($dados);
          //  var_dump($dados);
            print_r($foto);
            var_dump($foto);
            $extensao = end(explode('.',$foto['name']));
            $novoNome = rand(1,100000).date('dmYHis').'.'.$extensao; 
            $ok = move_uploaded_file($foto['tmp_name'],'./imagens/'.$novoNome);
            if($ok)
            {
            $image = $novoNome;
            }
            else
            {
            $image = $dados['foto_atual'];
            }
            
          

            $id_usuario = $dados['id_usuario'];
            $descricao = $dados['descricao'];
            $dt = date('Y-m-d H:i');
            
            $sql = $this->pdo->prepare("INSERT INTO postagens
            (id_usuario,descricao,dt, foto) VALUES (:id_usuario,:descricao,:dt, :foto)
            ");
            //mesclar dados ou tratar
            $sql->bindParam(':id_usuario',$id_usuario);
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':dt',$dt);
            $sql->bindParam(':foto',$image);

            //executar
            $sql->execute();
            return $this->pdo->LastInsertId();
         }
        public function atualizar(array $dados)
        {
            $descricao = $dados['descricao'];
            $dt = date('Y-m-d H:i');
            
            $sql = $this->pdo->prepare("UPDATE postagens SET
                                    descricao= :descricao,
                                    dt = :dt,
                                    foto = :foto
                                    WHERE
                                    id_postagem = :id_postagem
                                    LIMIT 1
                                    ");
            //mesclar dados ou tratar
            $sql->bindParam(':descricao',$descricao);
            $sql->bindParam(':foto',$imagem);
            $sql->bindParam(':dt',$dt);
            $sql->bindParam(':id_postagem',$dados['id_postagem']);


            //executar
            $sql->execute();  
        }
        public function apagar(int $id_postagem)
        {
            $sql = $this->pdo->prepare('DELETE FROM postagens WHERE id_postagem = :id_postagem');
            $sql->bindParam(':id_postagem',$id_postagem);
            $sql->execute();

        }

public function mostrar(int $id_postagem)
{
    $sql = $this->pdo->prepare("SELECT * FROM postagens WHERE id_postagem = :id_postagem");
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