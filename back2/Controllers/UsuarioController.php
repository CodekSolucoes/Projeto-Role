<?php 

class UsuarioController{

    public function __construct(private PDO $conexao){}
    
    /**
     * A função save vai verificar se foi passado um "id" pro 
     * usuario, se não foi então ela vai usar a função que cria
     * um novo usuario no banco, senão ela vai editar o usuario 
     * referente ao id passado.
     * 
     * @author Fabio Leal Schmitz
     */
    public function save(Usuario $usuario)
    {
        if($usuario->id === NULL){
            return $this->create($usuario);
        }
        return $this->update($usuario);
    }

    public function create(Usuario $usuario)
    {
        $query = "INSERT INTO usuarios(usuario, email, password) VALUES (:usuario, :email, :password)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':usuario', $usuario->usuario, PDO::PARAM_STR);
        $stmt->bindValue(':email', $usuario->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $usuario->password, PDO::PARAM_STR);
        $retorno = $stmt->execute();

        if($retorno == true){
            $usuario->id = $this->conexao->lastInsertId();
        }
        return $retorno;
    }
    public function update(Usuario $usuario)
    {
        $query = "UPDATE usuarios SET usuario = :usuario, email = :email, password = :password WHERE id = :id;";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':usuario', $usuario->usuario, PDO::PARAM_STR);
        $stmt->bindValue(':email', $usuario->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $usuario->password, PDO::PARAM_STR);

        return $stmt->execute();
    }
    /*
    public function read(Usuario $usuario)
    {
        $query = "SELECT * FROM usuario WHERE id = :id;";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $usuario->id, PDO::PARAM_INT);
        $stmt->execute();

        return $this->_toString($stmt);
    }
        */

    public function delete(Usuario $usuario)
    {
        $stmt = $this->conexao->prepare("DELETE FROM usuarios WHERE id = :id;");
        $stmt->bindValue(":id", $usuario->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function login(string $email, string $senha, PDO $pdo){
        $query = "SELECT usuario FROM usuarios WHERE email=:email AND password=:senha";
        $st = $pdo->prepare($query);
        $st->bindValue(":email", $email, PDO::PARAM_STR);
        $st->bindValue(":senha", $senha, PDO::PARAM_STR);
        $st->execute();
        if($st->fetch(PDO::FETCH_ASSOC)){
            return true;
        }else{
            return false;
        }
        
        
    }

}