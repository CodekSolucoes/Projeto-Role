<?php
    session_start();

    $configs = require 'DatabaseConfig.php';
    $pdo = new PDO($configs['DNS'], $configs['user'], $configs['pass'], $configs['options']);

    /*$pdo->query("CREATE TABLE IF NOT EXISTS usuarios(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    usuario VARCHAR(20),
                    email VARCHAR(50),
                    password VARCHAR(255)
    )");*/
