# Projeto PHP Refatorado — Portfólio Pessoal

## 📌 Sobre o projeto

Este projeto consiste na refatoração de um portfólio pessoal desenvolvido em PHP, com o objetivo de aplicar boas práticas de organização de código, reutilização de componentes e separação de responsabilidades.

A proposta foi transformar páginas originalmente estáticas em uma aplicação PHP modular, utilizando includes para padronizar o layout e melhorar a manutenção do sistema.

---

## 📁 Estrutura de arquivos

```
02_projetoPHP-02_refatorado/
│
├── index.php
├── sobre.php
├── includes/
│   ├── cabecalho.php
│   ├── nav.php
│   ├── rodape.php
│   └── estilo.css
│
├── 01_php-intro/
├── 02_formularios/
├── 03_pdo/
├── 04_sessoes/
└── 05_crud/
```

---

## 🔧 Decisões de refatoração

### 1. Separação de estrutura e conteúdo

**Problema:** O código HTML estava repetido em várias páginas, dificultando manutenção e alterações globais.
**Solução:** Criação dos arquivos `cabecalho.php` e `rodape.php`, responsáveis pela estrutura base da página.
**Motivo:** Evitar duplicação de código e permitir alterações centralizadas.

---

### 2. Inclusão dinâmica com `include` e `__DIR__`

**Problema:** Caminhos relativos inconsistentes causavam erros ao incluir arquivos em diferentes níveis de diretório.
**Solução:** Utilização de `include __DIR__ . '/includes/...';` para garantir caminhos absolutos baseados no diretório atual.
**Motivo:** Aumentar a confiabilidade e portabilidade do projeto.

---

### 3. Controle de navegação com variável `$pagina_atual`

**Problema:** O menu de navegação não indicava qual página estava ativa.
**Solução:** Implementação da variável `$pagina_atual` em cada página e uso condicional no `nav.php`.
**Motivo:** Melhorar a experiência do usuário e fornecer feedback visual consistente.

---

### 4. Centralização do CSS

**Problema:** Estilos estavam dispersos ou repetidos entre páginas.
**Solução:** Criação de um arquivo único (`estilo.css`) dentro da pasta `includes`.
**Motivo:** Facilitar manutenção, padronizar aparência e evitar redundância.

---

### 5. Gerenciamento de sessão centralizado

**Problema:** Chamadas múltiplas de `session_start()` geravam erros e avisos.
**Solução:** Centralização da inicialização da sessão no `cabecalho.php`, com verificação usando `session_status()`.
**Motivo:** Evitar conflitos e garantir controle consistente da sessão.

---

## ▶️ Como executar

No terminal, dentro da pasta do projeto:

```bash
cd /workspaces/2026-DWII/02_projetoPHP-02_refatorado
php -S localhost:8000
```

Acesse no navegador:

```
http://localhost:8000
```

---

## 👤 Autor

Rafael Henrique Freire
Curso Técnico em Informática — IFPR
Disciplina: Desenvolvimento Web II
Ano: 2026
