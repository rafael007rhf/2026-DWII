<?php
/**
 * ════════════════════════════════════════════════════════════
 * ARQUIVO    : 05_crud/includes/conexao.php
 * Autor      : Murilo Néfi de Faria
 * ════════════════════════════════════════════════════════════
 */

function conectar(): PDO {
    $host = '127.0.0.1';
    $db   = 'dwii_db';
    $user = 'dwii_user';
    $pass = 'dwii2026';
    $dsn  = "mysql:host={$host};dbname={$db};charset=utf8mb4";

    try {
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die('Erro de conexão com o banco de dados.');
    }
}
