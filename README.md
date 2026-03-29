# 📇 Gestor de Contactos — Laboratório Backend (PHP)

## 📖 Sobre o projeto

Este repositório contém o **laboratório prático de Backend** da formação **Capacita CFTI — Formação Backend**.

Após estudarmos:

- Funcionamento da Web
- Lógica de Programação
- Git e GitHub
- Fundamentos de Backend com PHP

iremos agora implementar **o backend de uma aplicação real**.

A aplicação consiste num **diretório de contactos**, onde será possível:

- Cadastrar contactos
- Listar contactos
- Pesquisar contactos
- Eliminar contactos

Os dados serão armazenados **num arquivo `.csv`**, simulando uma base de dados simples baseada em ficheiros.

---

# 🎯 Objetivo do laboratório

Implementar o **backend completo de um sistema simples de gestão de contactos**, utilizando apenas **PHP puro e manipulação de ficheiros**.

Este laboratório tem como objetivo praticar:

- Manipulação de dados com **arrays**
- Leitura e escrita de **ficheiros**
- Uso de **forms**
- Uso de **superglobais**
- Organização básica de código PHP
- Upload de ficheiros

---

# 🖥️ Interface da aplicação

A interface da aplicação já está pronta.

A tabela de contactos apresenta:

- Foto
- Nome
- Cargo
- Empresa
- Cidade
- Telefone
- Email
- Categoria
- Ações

O backend deverá fornecer os dados para esta interface.

---

# 📁 Armazenamento de dados

## Contactos

Os contactos são armazenados em:
data/contactos.csv

Cada linha representa um contacto.

Exemplo:

1,Jorge Tamba,Tecnico de TI,ENSA,Uige,+244999999999,tamba@gmail.com,Pessoal,jorge.jpg
2,Maria Silva,Gestora,BAI,Luanda,+244923000000,maria@gmail.com,Trabalho,maria.png


---

## Fotos

As fotos dos contactos devem ser guardadas em:


uploads/

Exemplo:


uploads/
jorge.jpg
maria.png



No ficheiro CSV é armazenado apenas **o nome da imagem**.

---

# 📦 Estrutura do contacto

Cada contacto possui os seguintes campos:

| Campo | Descrição |
|------|-----------|
| id | Identificador único |
| nome | Nome do contacto |
| cargo | Cargo ou função |
| empresa | Empresa |
| cidade | Cidade |
| telefone | Número de telefone |
| email | Email |
| categoria | Pessoal ou Trabalho |
| foto | Nome do ficheiro da foto |

---

# ⚙️ Funcionalidades

## ➕ Cadastrar contacto

Permitir adicionar um novo contacto.

Requisitos:

- Receber dados via **form (`POST`)**
- Receber **foto (`$_FILES`)**
- Guardar imagem na pasta `uploads`
- Gerar **ID único**
- Salvar contacto no arquivo `.csv`

---

## 📋 Listar contactos

Mostrar todos os contactos na tabela.

Requisitos:

- Ler o ficheiro `.csv`
- Converter cada linha num array
- Apresentar os dados na interface

---

## 🔎 Pesquisar contactos

Permitir pesquisar contactos pelo:

- **Nome**
- **Telefone**

Requisitos:

- Receber termo via `GET`
- Filtrar contactos

---

## ❌ Eliminar contacto

Permitir remover um contacto.

Requisitos:

- Receber **ID do contacto**
- Reescrever o `.csv` sem o contacto removido
- Apagar também a **foto associada**

---

# 🧱 Estrutura sugerida do projeto

# ⚙️ Funcionalidades

## ➕ Cadastrar contacto

Permitir adicionar um novo contacto.

Requisitos:

- Receber dados via **form (`POST`)**
- Receber **foto (`$_FILES`)**
- Guardar imagem na pasta `uploads`
- Gerar **ID único**
- Salvar contacto no arquivo `.csv`

---

## 📋 Listar contactos

Mostrar todos os contactos na tabela.

Requisitos:

- Ler o ficheiro `.csv`
- Converter cada linha num array
- Apresentar os dados na interface

---

## 🔎 Pesquisar contactos

Permitir pesquisar contactos pelo:

- **Nome**
- **Telefone**

Requisitos:

- Receber termo via `GET`
- Filtrar contactos

---

## ❌ Eliminar contacto

Permitir remover um contacto.

Requisitos:

- Receber **ID do contacto**
- Reescrever o `.csv` sem o contacto removido
- Apagar também a **foto associada**

---

# 🧱 Estrutura sugerida do projeto


project/
│
├── index.php
├── adicionar.php
├── eliminar.php
│
├── functions.php
│
├── uploads/
│
└── data/
└── contactos.csv


---

# 📌 Regras do laboratório

- ❌ Não utilizar base de dados
- ✔️ Persistência apenas com **CSV**
- ✔️ Utilizar **funções reutilizáveis**
- ✔️ Código organizado e legível
- ✔️ Validar dados básicos

---

# ⭐ Desafios extras (opcional)

Se terminar antes do tempo:

- Mostrar **foto do contacto na tabela**
- Implementar **filtro por categoria**
- Implementar **imagem padrão quando não houver foto**
- Ordenar contactos **por nome**
- Validar **tamanho máximo da imagem**

---

# ⏱️ Duração do laboratório

**3 horas**

---

# 🚀 Resultado esperado

Ao final do laboratório o sistema deverá permitir:

- Criar contactos
- Ver contactos na lista
- Pesquisar contactos
- Eliminar contactos
- Upload de foto para cada contacto

---

# 👨‍💻 Tecnologias utilizadas

- PHP
- HTML Forms
- CSV (file storage)
- Upload de ficheiros

---
