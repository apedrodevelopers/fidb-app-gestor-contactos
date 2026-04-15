<?php
require "funcoes.php";

$caminhoBanco = "data\contactos.csv";

$contactos = buscarContactos($caminhoBanco);

$total = count($contactos);
$trabalho = 0;
$pessoal = 0;

foreach ($contactos as $contacto) {
  if ($contacto["categoria"] === "Trabalho") {
    $trabalho++;
  }

  if ($contacto["categoria"] === "Pessoal") {
    $pessoal++;
  }
}

$filtro = "";
if (isset($_GET["q"])) {
  $filtro = $_GET["q"];

  $contactos = pesquisarContacto($contactos, $filtro);
}



?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Contactos</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Epilogue:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <!-- TICKER -->
  <div class="ticker">
    Capacita CFTI · Formação Inicial de Desenvolvimento Backend
  </div>

  <!-- MASTHEAD -->
  <header class="masthead">
    <div class="mast-left">
      <div class="mast-issue">EDIÇÃO ESPECIAL · DIRECTÓRIO PESSOAL</div>
      <div class="mast-title">LISTA DE<br><span>CONTACTOS</span></div>
    </div>
    <div></div>
    <div class="mast-right">
      <div class="mast-stats">
        <div class="mast-stat">
          <div class="mast-stat-n"> <?= $total ?> </div>
          <div class="mast-stat-l">Total</div>
        </div>
        <div class="mast-stat" style="margin-left:4px">
          <div class="mast-stat-n" style="color:var(--lime)"> <?= $trabalho ?> </div>
          <div class="mast-stat-l">Trabalho</div>
        </div>
        <div class="mast-stat" style="margin-left:4px">
          <div class="mast-stat-n" style="color:#888"> <?= $pessoal ?> </div>
          <div class="mast-stat-l">Pessoal</div>
        </div>
      </div>
    </div>
  </header>

  <form class="toolbar">
    <div class="search-wrap">
      <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="8" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
      </svg>
      <input name="q" class="search-input" type="text" placeholder="Pesquisar contactos…" value="">
    </div>
    <button class="search-btn" type="submit">Pesquisar</button>
    <div class="spacer"></div>


    <a class="new-btn" href="#modal-add">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <line x1="12" y1="5" x2="12" y2="19" />
        <line x1="5" y1="12" x2="19" y2="12" />
      </svg>
      NOVO CONTACTO
    </a>
  </form>

  <!-- TABLE -->
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th style="min-width:200px">
            <a href="?sort=name">NOME</a>
          </th>
          <th style="min-width:150px"><a href="?sort=role">CARGO</a></th>
          <th style="width:180px"><a href="?sort=company">EMPRESA</a></th>
          <th style="width:130px"><a href="?sort=city">CIDADE</a></th>
          <th style="width:170px">TELEFONE</th>
          <th style="width:210px">E-MAIL</th>
          <th style="width:110px"><a href="?sort=cat">CATEGORIA</a></th>
          <th style="width:88px;cursor:default">ACÇÕES</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($contactos as $index => $contacto) {
        ?>

          <tr>
            <td class="td-no"> <?= $index + 1 ?> </td>
            <td>
              <div class="name-cell">
                <div class="name-av">
                  <!-- Foto de perfil via UI Avatars (serviço gratuito) -->
                  <img
                    src="/app-gestor-contactos/uploads/<?= $contacto["nome_imagem"] ?>"
                    alt="Jorge Tamba"
                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                  <span class="av-initials" style="display:none;background:#111110;color:#C8F135;width:100%;height:100%;align-items:center;justify-content:center;">JT</span>
                </div>
                <span class="name-text"> <?= $contacto["nome"] . " " . $contacto["apelido"] ?> </span>
              </div>
            </td>
            <td> <?= $contacto["cargo"] ?> </td>
            <td><?= $contacto["empresa"] ?></td>
            <td><?= $contacto["cidade"] ?></td>
            <td> <?= $contacto["telefone"] ?> </td>
            <td> <?= $contacto["email"] ?> </td>
            <td><span class="cat-badge cat-personal"> <?= $contacto["categoria"] ?> </span></td>
            <td>
              <div class="act-cell">
                <!-- PHP: href="editar.php?id=<?= $c['id'] ?>" -->
                <!-- <a class="icon-btn" href="editar.php?id=1" title="Editar">
                  <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                </a> -->
                <!-- PHP: href="eliminar.php?id=<?= $c['id'] ?>" ou #modal-delete -->
                <a class="icon-btn del" href="eliminar-contacto.php?id=<?= $contacto["id"] ?>" title="Eliminar">
                  <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="3 6 5 6 21 6" />
                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                    <path d="M10 11v6" />
                    <path d="M14 11v6" />
                  </svg>
                </a>
              </div>
            </td>
          </tr>

        <?php
        }
        ?>


      </tbody>
    </table>
  </div>

  <!-- FOOTER -->
  <footer>
    <span>LISTA DE CONTACTOS · DIRECTÓRIO PESSOAL</span>

    <span class="footer-count">5 REGISTOS</span>
    <span><?= date('d \d\e F \d\e Y') /* PHP */ ?> · 29 DE MARÇO DE 2026</span>
  </footer>


  <!-- ═══════════════════════════════════════════════════
         MODAL — NOVO CONTACTO
         ═══════════════════════════════════════════════════ -->
  <div class="overlay" id="modal-add">
    <div class="modal">
      <div class="modal-head">
        <span class="modal-head-title">NOVO CONTACTO</span>
        <!-- Fecha voltando ao URL sem âncora -->
        <a class="modal-close" href="#">✕</a>
      </div>

      <form action="adicionar-contacto.php" method="post" enctype="multipart/form-data">

        <!-- ZONA DE UPLOAD DE FOTO -->
        <div class="photo-upload-zone">
          <input type="file" name="foto" id="f-photo" accept="image/*">
          <div class="photo-preview-wrap">
            <div class="photo-placeholder">
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
              <span>Foto</span>
            </div>
          </div>
          <div class="photo-upload-info">
            <div class="photo-upload-label">FOTO DE PERFIL</div>
            <div class="photo-upload-sub">Clique ou arraste uma imagem aqui</div>
            <div class="photo-upload-sub">JPG, PNG · Máx. 5MB</div>
          </div>
        </div>

        <div class="modal-body">
          <div class="field">
            <label>Primeiro Nome *</label>
            <input type="text" name="primeiro_nome" placeholder="Ana" required>
          </div>
          <div class="field">
            <label>Apelido *</label>
            <input type="text" name="apelido" placeholder="Silva" required>
          </div>
          <div class="field"><label>Email</label><input type="email" name="email" placeholder="ana@exemplo.com"></div>
          <div class="field"><label>Telefone</label><input type="tel" name="telefone" placeholder="+244 900 000 000"></div>
          <div class="field"><label>Cargo</label><input type="text" name="cargo" placeholder="Designer"></div>
          <div class="field"><label>Empresa</label><input type="text" name="empresa" placeholder="Empresa Lda."></div>
          <div class="field"><label>Categoria</label>
            <select name="categoria">
              <option value="Trabalho">Trabalho</option>
              <option value="Pessoal">Pessoal</option>
            </select>
          </div>
          <div class="field"><label>Cidade</label><input type="text" name="cidade" placeholder="Luanda"></div>
        </div>

        <div class="modal-foot">
          <a class="mbtn mbtn-ghost" href="#">Cancelar</a>
          <button class="mbtn mbtn-save" type="submit">GUARDAR</button>
        </div>

      </form>
    </div>
  </div>


  <!-- ═══════════════════════════════════════════════════
         MODAL — CONFIRMAR ELIMINAÇÃO
         ═══════════════════════════════════════════════════ -->
  <div class="overlay" id="modal-delete">
    <div class="modal" style="max-width:400px">
      <div class="modal-head">
        <span class="modal-head-title">ELIMINAR CONTACTO</span>
        <a class="modal-close" href="#">✕</a>
      </div>

      <form>

        <input type="hidden" value="">
        <div class="del-body">
          <p>Tem a certeza que deseja eliminar este contacto?<br>
            Esta acção <strong>não pode ser desfeita</strong>.</p>
        </div>
        <div class="modal-foot">
          <a class="mbtn mbtn-ghost" href="#">Cancelar</a>
          <button class="mbtn mbtn-del" type="submit">ELIMINAR</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>