<?php

require "funcoes.php";

$id = $_GET["id"];

$caminhoBanco = "data\contactos.csv";

eliminarContacto($id, $caminhoBanco);

header("Location: /app-gestor-contactos");
