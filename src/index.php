<?php
require_once 'controller.php';
$controller = new homeController();

$controller->homeView();

$result = $controller->listar();

$id = $_GET['id'];

if(isset($_GET['id'])){
    $controller->excluir($_GET['id']);
}

?>

<link rel="stylesheet" href="output.css">

<div class="flex w-screen h-screen items-center justify-center gap-12">
    <div class="flex">
        <form method="POST" class="flex flex-col gap-2">
            <div class="flex flex-col">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="name" class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
            </div>
            <div class="flex flex-col">
                <label for="senha">Senha:</label>
                <input type="text" id="senha" name="senha" class="bg-zinc-200 p-2 outline-none w-44 rounded-md">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white font-medium text-lg p-2 w-24 rounded-lg">Cadastrar<button />
        </form>
    </div>
    <div>
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-black ">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $dados): ?>
                    <tr class="bg-black text-white">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-medium">
                                    <?= $dados['nome'] ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm"><?= $dados['email'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <?php 
                                echo "<a href='?id=".$dados['id']."' class='text-red-500'>Excluir</a>";
                                echo "<a href='alterar.php/?id=".$dados['id']."' class='text-blue-500'>Editar</a>";
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>