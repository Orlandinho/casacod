<?php

include "ajudante.php";
include "banco.php";

$tem_erros = false;
$erros_validação = [];

if(tem_post()){
    
    $tarefa_id = $_POST['tarefa-id'];
    
    if(!array_key_exists['anexo', $_FILES]){
        $tem_erros = true;
        $erros_validacao['anexo'] = "Você deve selecionar um arquivo para anexar!";
    } else {
        if(tratar_anexo($_FILES['anexo'])){
            $nome = $_FILES['anexo']['name'];
            $anexo = [
                "tarefa_id"=>$tarefa_id,
                "nome"=>substr($nome, 0, -4),
                "arquivo"=>$nome,
            ];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = "Envie arquivos nos formatos pdf ou zip!";
        }
    }
    
    if(!tem_erros){
        gravar_anexo($conexao, $anexo);
    }
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);

include "template_tarefa.php";

?>