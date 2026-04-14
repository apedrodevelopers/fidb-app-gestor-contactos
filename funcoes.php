<?php

function gerarId(): int
{
    return random_int(99999, 999999999);
}

function salvarContacto(array $dadosContacto, string $caminhoBanco): void {
    
    $id = $dadosContacto["id"];
    $nome = $dadosContacto["nome"];
    $apelido = $dadosContacto["apelido"];
    $email = $dadosContacto["email"];
    $telefone = $dadosContacto["telefone"];
    $cargo = $dadosContacto["cargo"];
    $empresa = $dadosContacto["empresa"];
    $categoria = $dadosContacto["categoria"];
    $cidade = $dadosContacto["cidade"];
    $nomeImagem = $dadosContacto["nome_imagem"];

    $conteudo = "$id;$nome;$apelido;$email;$telefone;$cargo;$empresa;$categoria;$cidade;$nomeImagem\n";

    file_put_contents($caminhoBanco, $conteudo, FILE_APPEND);
}

function salvarImagem(string $origemArquivo, string $destinoArquivo): void {
    move_uploaded_file($origemArquivo, $destinoArquivo);
}