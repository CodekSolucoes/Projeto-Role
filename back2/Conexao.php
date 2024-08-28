<?php

    $configs = require 'DatabaseConfig.php';
    $pdo = new PDO($configs['DNS'], $configs['user'], $configs['pass'], $configs['options']);