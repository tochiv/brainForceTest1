<?php

declare(strict_types=1);

namespace Classes\Core;

use PDO;
use PDOException;

class DBConnection extends PDO
{
    public function __construct($host, $dbname, $user, $password)
    {
        try {
            parent::__construct('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);

        } catch (PDOException $e) {
            echo "ОШИБКА ПОДКЛЮЧЕНИЯ К БД\n";
            echo $e->getMessage();
        }
    }
}