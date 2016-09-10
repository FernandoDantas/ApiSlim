<?php
$acao = $_POST["acao"];
$id = $_POST["id"];

require_once("includes/config.php");

$dados = array(
    "id"        => $id,
    "titulo"    => $_POST["txt_titulo"],
    "descricao" => $_POST["txt_descricao"],
    "data"      => $_POST["txt_data"],
    "hora"      => $_POST["txt_hora"]
);

$json = json_encode($dados);

if(($acao=="Cadastrar") || ($acao=="Editar")){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, SALVAR);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ARRAY(
                "Content-Type: application/json",
                "Content-Length:". strlen($json)
    ));

    curl_exec($ch);
}else if($acao=="Excluir"){
    
    $ch = curl_init(EXCLUIR.$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $resultado = curl_exec($ch);
}

if(curl_getinfo($ch,CURLINFO_HTTP_CODE ) == 200){
    header("location:index.php?link=2");
}else{
    echo "não deu";
}

curl_close($ch);