# Catálogo de Tecnologias

Projeto desenvolvido em PHP com PDO e MariaDB.

## 📌 Funcionalidades
- Listagem de tecnologias
- Filtro por categoria
- Busca por texto
- Página de detalhes
- Página 404 personalizada

## 🗄️ Estrutura da tabela

- id (INT, PK)
- nome (VARCHAR)
- categoria (VARCHAR)
- descricao (TEXT)
- ano_criacao (INT)
- criado_em (TIMESTAMP)

## ⚙️ Setup

1. Importar o arquivo sql/setup.sql no MariaDB
2. Configurar conexao.php
3. Rodar o projeto no servidor local
