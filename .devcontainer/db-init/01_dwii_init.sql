-- ============================================================
-- Inicialização do banco de dados — 2026-DWII
-- Autor: Murilo Néfi de Faria
-- ============================================================

USE dwii_db;

CREATE TABLE IF NOT EXISTS tecnologias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    ano_criacao INT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tecnologias (nome, categoria, descricao, ano_criacao)
SELECT * FROM (
    SELECT 'HTML', 'Frontend', 'Linguagem de marcação para estrutura de páginas web.', 1993
    UNION ALL SELECT 'CSS', 'Frontend', 'Linguagem de estilos para apresentação visual de páginas.', 1996
    UNION ALL SELECT 'PHP', 'Backend', 'Linguagem server-side amplamente usada para web dinâmica.', 1994
    UNION ALL SELECT 'MariaDB', 'Banco de Dados', 'Sistema de gerenciamento de banco de dados relacional open-source.', 2009
    UNION ALL SELECT 'JavaScript', 'Frontend', 'Linguagem de programação para interatividade no navegador.', 1995
    UNION ALL SELECT 'Git', 'DevOps', 'Sistema de controle de versão distribuído.', 2005
) AS novos(nome, categoria, descricao, ano_criacao)
WHERE NOT EXISTS (SELECT 1 FROM tecnologias);

CREATE TABLE IF NOT EXISTS projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    descricao TEXT NOT NULL,
    tecnologias VARCHAR(200) NOT NULL,
    link_github VARCHAR(255) NULL,
    ano INT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
