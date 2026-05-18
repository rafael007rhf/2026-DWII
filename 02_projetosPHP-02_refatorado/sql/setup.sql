
DROP DATABASE IF EXISTS dwii_db;
DROP DATABASE IF EXISTS portfolio;

CREATE DATABASE portfolio
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE portfolio;

CREATE TABLE usuarios (
    id        INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    login     VARCHAR(50)   NOT NULL UNIQUE,
    senha     VARCHAR(255)  NOT NULL,                 -- hash bcrypt
    email     VARCHAR(150)  NOT NULL UNIQUE,
    status    ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
    criado_em DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tecnologias (
    id          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(100)  NOT NULL,
    categoria   VARCHAR(50)   NOT NULL,
    descricao   TEXT,
    ano_criacao INT,
    status      ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
    criado_em   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE projetos (
    id            INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nome          VARCHAR(120)  NOT NULL,
    descricao     TEXT          NOT NULL,
    tecnologias   VARCHAR(200)  NOT NULL,
    link_github   VARCHAR(300)      NULL DEFAULT NULL,
    ano           YEAR          NOT NULL,
    status        ENUM('rascunho','publicado','arquivado')
                                NOT NULL DEFAULT 'rascunho',
    criado_em     DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME          NULL DEFAULT NULL
                                ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE logs (
    id             INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    tabela_afetada VARCHAR(50)   NOT NULL,
    registro_id    INT UNSIGNED  NOT NULL,
    acao           ENUM('INSERT','UPDATE','STATUS') NOT NULL,
    usuario_login  VARCHAR(50)       NULL DEFAULT NULL,
    detalhes       TEXT              NULL,
    criado_em      DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO usuarios (login, senha, email) VALUES
  ('admin', '$2y$10$TjUcQnM9tVwLOblRfS9Bp./DmfuaVP0rqBp0FgolMhJotHHuT7EPm', 'admin@portfolio.local');

INSERT INTO tecnologias (nome, categoria, descricao, ano_criacao) VALUES
  ('HTML',       'Frontend',       'Linguagem de marcação para estrutura de páginas web.', 1993),
  ('CSS',        'Frontend',       'Linguagem de estilos para apresentação visual.',       1996),
  ('JavaScript', 'Frontend',       'Linguagem de programação para o navegador.',           1995),
  ('PHP',        'Backend',        'Linguagem server-side para web dinâmica.',             1994),
  ('MariaDB',    'Banco de Dados', 'SGBD relacional open-source.',                         2009),
  ('Git',        'DevOps',         'Sistema de controle de versão distribuído.',           2005);

INSERT INTO projetos (nome, descricao, tecnologias, ano, status) VALUES
  ('Portfólio Pessoal',
   'Site de portfólio com PHP, PDO e MariaDB.',
   'PHP, MariaDB, CSS', 2026, 'publicado'),
  ('Formulário de Contato',
   'Formulário com validação no servidor e padrão PRG.',
   'PHP, HTML, CSS',    2026, 'publicado');
