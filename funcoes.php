<?php

function gerarId(): int
{
    return random_int(99999, 999999999);
}

function salvarContacto(array $dadosContacto, string $caminhoBanco): void
{

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

function salvarImagem(string $origemArquivo, string $destinoArquivo): void
{
    move_uploaded_file($origemArquivo, $destinoArquivo);
}

function buscarContactos(string $caminhoBanco): array
{
    // 815190750;Lucas;da Silva;lucas@gmail.com;999 999 999;Diretor de Marketing;ENSA;Trabalho;Uige;815190750.jpg
    // 723030187;Pedro;Tamba;pedro@gmail.com;888 888 888;Nenhum;Nenhuma;Pessoal;Luanda;723030187.jpg
    // 886960971;Ana;Nzuzi;ana@hotmail.com;777 777 777;Gestora de Balcao;Unitel;Trabalho;Bengo;886960971.jpg

    $conteudo = file_get_contents($caminhoBanco);

    $resultado = explode("\n", $conteudo);
    $novoResultado = [];

    foreach ($resultado as $linha) {
        if ($linha !== "") {
            $item = explode(";", $linha);
            $novoResultado[] = $item;
        }
    }

    $novoResultadoAssociativo = [];
    foreach ($novoResultado as $item) {

        $itemAdicionar = [
            "id" => $item[0],
            "nome" => $item[1],
            "apelido" => $item[2],
            "email" => $item[3],
            "telefone" => $item[4],
            "cargo" => $item[5],
            "empresa" => $item[6],
            "categoria" => $item[6],
            "cidade" => $item[7],
            "nome_imagem" => $item[8],
        ];

        $novoResultadoAssociativo[] = $itemAdicionar;
    }

    return $novoResultadoAssociativo;
}
