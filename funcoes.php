<?php

function gerarId(): int
{
    return random_int(99999, 999999999);
}

function salvarContacto(array $dadosContacto,    string $caminhoBanco): void
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
            "categoria" => $item[7],
            "cidade" => $item[8],
            "nome_imagem" => $item[9],
        ];

        $novoResultadoAssociativo[] = $itemAdicionar;
    }

    return $novoResultadoAssociativo;
}

function pesquisarContacto(array $contactos, string $filtro): array
{
    if ($filtro === "") {
        return $contactos;
    }

    $resultado = [];
    foreach ($contactos as $contacto) {
        if ($filtro === $contacto["nome"] || $filtro === $contacto["telefone"] || $filtro === $contacto["email"]) {
            $resultado[] = $contacto;
        }
    }
    return $resultado;
}

function limparDados(string $caminhoBanco): void
{
    file_put_contents($caminhoBanco, "");
}

function eliminarContacto(int $idContacto, string $caminhoBanco): void
{
    // recuperar os contactos existentes
    // resetamos o banco
    // filtrar os contactos cujo id seja diferente do que se pretende eliminar
    // sobreescrever o banco(arquivo) com os dados filtrados
    $contactosExistentes = buscarContactos($caminhoBanco);

    limparDados($caminhoBanco);

    $resultado = [];

    foreach ($contactosExistentes as $contacto) {
        if ($contacto["id"] != $idContacto) {
            $resultado[] = $contacto;
        }
    }

    foreach ($resultado as $contacto) {
        salvarContacto($contacto, $caminhoBanco);
    }
}
