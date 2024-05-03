<?php
require_once 'banco.php';
$banco = new Banco();

class model
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct($id, $nome, $email, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function _getId()
    {
        return $this->id;
    }

    public function _setId($propriedade)
    {
        $this->id = $propriedade;
    }

    public function _getNome()
    {
        return $this->nome;
    }

    public function _setNome($propriedade)
    {
        $this->nome = $propriedade;
    }

    public function _getEmail()
    {
        return $this->email;
    }

    public function _setEmail($propriedade)
    {
        $this->email = $propriedade;
    }

    public function _getSenha()
    {
        return $this->senha;
    }

    public function _setSenha($propriedade)
    {
        $this->senha = $propriedade;
    }

    public function inserir()
    {
        global $banco;
        $result = $banco->query("INSERT INTO mvc (nome, email, senha) VALUES ('$this->nome','$this->email','$this->senha')");
        return $result;
    }

    public function listar()
    {
        global $banco;
        $result = $banco->query("SELECT * FROM mvc");
        return $result;
    }

    public function deletar($id)
    {
        global $banco;
        $result = $banco->query("DELETE FROM mvc WHERE id = $id");
        return $result;
    }

    public function editar($id, $nome, $email, $senha){
        global $banco;
        $query = "UPDATE mvc SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
        $stmt = $banco->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function exibir($id)
    {
        global $banco;
        $result = $banco->query("SELECT * FROM mvc WHERE id = $id");
        return $result;
    }

}
?>