<?php
require_once 'controller.php';

$controller = new homeController();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dados = $controller->exibir($id);
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['senha'])){
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $controller->editar($id, $nome, $email, $senha);
}


?>


<link rel="stylesheet" href="output.css">


<div>
    <h1>Aletar</h1>
    <div class="flex">
        <?php foreach ($dados as $dados_item): ?>
            <form method="POST" class="flex flex-col gap-2">
                <div class="flex flex-col">
                    <label for="nome">Nome:</label>
                    <input type="text" value="<?php echo $dados_item['nome'] ?>" id="nome" name="name"
                        class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="email">E-mail:</label>
                    <input type="text" value="<?php echo $dados_item['email'] ?>" id="email" name="email"
                        class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="senha">Senha:</label>
                    <input type="text" value="<?php echo $dados_item['senha'] ?>" id="senha" name="senha"
                        class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white font-medium text-lg p-2 w-24 rounded-lg">Alterar</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>