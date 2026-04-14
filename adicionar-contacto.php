<?php
require "funcoes.php";

// Recuperar os dados submetidos
$nome = $_POST["primeiro_nome"];
$apelido = $_POST["apelido"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cargo = $_POST["cargo"];
$empresa = $_POST["empresa"];
$categoria = $_POST["categoria"];
$cidade = $_POST["cidade"];

$caminhoImagemCarregada = $_FILES["foto"]["tmp_name"];

// Validar

// Salvar
$id = gerarId();

$nomeImagem = "$id.jpg";

$caminhoBanco = "data\contactos.csv";

$dadosContacto = [
    "id" => $id,
    "nome" => $nome,
    "apelido" => $apelido,
    "email" => $email,
    "telefone" => $telefone,
    "cargo" => $cargo,
    "empresa" => $empresa,
    "categoria" => $categoria,
    "cidade" => $cidade,
    "nome_imagem" => $nomeImagem,
];

salvarContacto($dadosContacto, $caminhoBanco);

$origemArquivo = $caminhoImagemCarregada;
$destinoArquivo = "uploads\\" . $nomeImagem;

salvarImagem($origemArquivo, $destinoArquivo);

// Redirecionar o usuario para a pagina principal
header("Location: /app-gestor-contactos");