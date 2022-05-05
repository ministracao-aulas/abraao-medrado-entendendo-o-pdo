<?php
    $host       = '127.0.0.1';
    $dbname     = 'aula_abraao_pdo';
    $dbPort     = 1070;
    $username   = 'root';
    $password   = 'mysql';

try {
    $pdo = new PDO("mysql:host=$host;dbname={$dbname};port={$dbPort}", $username, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
