# Formulário de Contato

Este projeto contém uma página de **formulário de contato desenvolvida em PHP**, com validação de dados e redirecionamento após envio bem-sucedido.

O objetivo é praticar **formulários HTML, validação em PHP e tratamento seguro de dados do usuário**.

---

## Campos do formulário

O formulário possui os seguintes campos:

* **Nome** (`nome_visitante`)
* **Email** (`email`)
* **Assunto** (`assunto`)
* **Mensagem** (`mensagem`)

---

## Validações implementadas

As seguintes validações foram implementadas no PHP:

### Nome

* Campo obrigatório.

### Email

* Campo obrigatório.
* Validação de formato usando `filter_var($email, FILTER_VALIDATE_EMAIL)`.

### Assunto

* O usuário deve selecionar uma opção.

### Mensagem

* Campo obrigatório.
* Deve conter **no mínimo 10 caracteres**.
* Deve conter **no máximo 500 caracteres**.

### Segurança

* Dados exibidos na página utilizam `htmlspecialchars()` para evitar **XSS (Cross-Site Scripting)**.

### Preservação de dados

Se ocorrer erro no envio, os valores digitados pelo usuário permanecem nos campos do formulário.

### Contador de caracteres

Após o envio, o sistema exibe quantos caracteres da mensagem foram utilizados:

`X de 500 caracteres usados`

---

## Funcionamento

1. O usuário preenche o formulário.
2. Os dados são enviados via **POST** para `contato.php`.
3. O PHP realiza as validações.
4. Se houver erros, eles são exibidos na tela.
5. Se não houver erros, o usuário é redirecionado para `obrigado.php`.

---

## Como executar

```
cd ~/workspaces/2026-DWII
php -S localhost:8001
```

Acesse: http://localhost:8001 

Clique na seção de contato

Preencha o formulário e envie para testar as validações.