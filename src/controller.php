<?php
require_once 'model.php';

class homeController
{
    public function homeView()
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['senha'])) {
            $nome = $_POST['name'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $model = new model("", $nome, $email, $senha);
            $result = $model->inserir();
            if ($result) {
                echo "<script>alert('Cadastrado com sucesso!')</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar!')</script>";
            }
        }
    }

    public function listar()
    {
        $model = new model("", "", "", "");
        $result = $model->listar();
        return $result;
    }

    public function excluir($id)
    {
        $model = new model("", "", "", "");
        $result = $model->deletar($id);
        if ($result) {
            echo "<script>alert('Deletado com sucesso!')</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('Erro ao deletar!')</script>";
        }
    }

    public function editar($id, $nome, $email, $senha)
    {
        $model = new model("", "", "", "");
        $model->editar($id, $nome, $email, $senha);
        header("Location: ../index.php");

    }

    public function exibir($id)
    {
        $model = new model("", "", "", "");
        $result = $model->exibir($id);
        return $result;
    }
}
?>