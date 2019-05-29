<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if(mysqli_connect_errno($conexao)){
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_tarefas($conexao){
    $sqlBusca = "SELECT * FROM tarefa";
    $resultado = mysqli_query($conexao, $sqlBusca);
    
    $tarefas = [];
    
    while($tarefa = mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }
    
    return $tarefas;
}

function gravar_tarefas($conexao, $tarefa){
    $sqlGravar = "INSERT INTO tarefa (nome, descricao, prazo, prioridade, concluida) VALUES ('{$tarefa['nome']}', '{$tarefa['descricao']}', '{$tarefa['prazo']}', {$tarefa['prioridade']}, {$tarefa['concluida']})";
    
    mysqli_query($conexao, $sqlGravar);
    
    header('Location: tarefas.php');
    die();
}

function buscar_tarefa($conexao, $id){
    $sqlBusca = 'SELECT * FROM tarefa WHERE id = ' . $id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa){
    
    $sqlEditar = "UPDATE tarefa SET nome = '{$tarefa['nome']}', descricao = '{$tarefa['descricao']}', prioridade = {$tarefa['prioridade']}, prazo = '{$tarefa['prazo']}', concluida = {$tarefa['concluida']} WHERE id = {$tarefa['id']}";
    
    mysqli_query($conexao, $sqlEditar);
}

function remover_tarefa($conexao, $id){
    
    $sqlRemover = "DELETE FROM tarefa WHERE id = {$id}";
    
    mysqli_query($conexao, $sqlRemover);
}

?>