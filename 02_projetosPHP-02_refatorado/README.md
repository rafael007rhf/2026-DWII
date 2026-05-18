# Portfólio Pessoal — Versão Refatorada (DWII)

## 📌 Sobre o projeto

Este projeto consiste em um portfólio pessoal desenvolvido em PHP durante a disciplina de Desenvolvimento Web II.
O objetivo é apresentar informações acadêmicas, pessoais e projetos, aplicando boas práticas de organização, reutilização de código e separação de responsabilidades.

A versão refatorada tem como foco melhorar a estrutura do código, reduzir redundâncias e tornar o projeto mais escalável e manutenível.

---

## 📁 Estrutura de arquivos

```
02_projetoPHP-02_refatorado/
│
├── index.php
├── sobre.php
│
├── includes/
│   ├── cabecalho.php
│   └── rodape.php
│
├── imgs/
│   └── perfil.jpg
│
└── README.md
```

---

## 🔧 Decisões de refatoração

### 1. Centralização de componentes reutilizáveis

**Problema:**
Código HTML repetido em múltiplas páginas (como `<head>`, cabeçalho e rodapé).

**Solução:**
Criação da pasta `includes/` contendo:

* `cabecalho.php`
* `rodape.php`

Esses arquivos são incluídos com `include`, evitando duplicação de código e facilitando a manutenção.

---

### 2. Padronização de variáveis globais de página

**Problema:**
Falta de padrão na definição de variáveis como título da página, página atual e caminhos.

**Solução:**
Definição de um padrão em todas as páginas:

```php
$pagina_atual
$titulo_pagina
$caminho_raiz
```

Isso permite que o `cabecalho.php` utilize essas variáveis dinamicamente.

---

### 3. Controle correto de sessão

**Problema:**
Uso inconsistente de `session_start()`, podendo gerar erro de "headers already sent".

**Solução:**
Implementação da verificação:

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

Garantindo que a sessão seja iniciada apenas quando necessário e antes de qualquer saída HTML.

---

### 4. Segurança na saída de dados (XSS)

**Problema:**
Exibição direta de variáveis no HTML, tornando o sistema vulnerável a ataques XSS.

**Solução:**
Uso da função:

```php
htmlspecialchars()
```

Aplicada em todas as saídas dinâmicas, como:

```php
<?php echo htmlspecialchars($nome); ?>
```

---

### 5. Organização de dados em estruturas (arrays)

**Problema:**
Conteúdo fixo diretamente no HTML, dificultando manutenção (ex: lista de formações).

**Solução:**
Utilização de arrays PHP para armazenar dados:

```php
$formacoes = [ ... ];
```

E renderização dinâmica com `foreach`, facilitando futuras alterações.

---

### 6. Correção e padronização de caminhos

**Problema:**
Uso inconsistente de caminhos relativos (`../`), causando erros de inclusão.

**Solução:**
Padronização com:

```php
__DIR__ . '/includes/arquivo.php'
```

Isso garante caminhos absolutos no servidor e evita falhas.

---

## ▶️ Como executar

### Pré-requisitos:

* PHP 7 ou superior
* Servidor local (XAMPP, WAMP ou similar)

### Executando com servidor embutido do PHP:

No terminal, dentro da pasta do projeto:

```bash
php -S localhost:8000
```

Depois, acesse no navegador:

```
http://localhost:8000
```

---

## 👨‍💻 Autor

**Nome:** Rafael Freire
**Curso:** Técnico em Informática — IFPR CRPG
**Disciplina:** Desenvolvimento Web II
**Ano:** 2026
