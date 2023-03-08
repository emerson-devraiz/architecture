<?php

namespace architecture\infra\repositories;

class MariaDB 
{
    private static $instance;

    public static function conn(
        string $host     = DB_HOST,
        string $user     = DB_USERNAME,
        string $password = DB_PASSWORD,
        string $database = DB_DATABASE
    ) {
        if (!isset(self::$instance)) {
            self::$instance = new \mysqli($host, $user, $password, $database);

            if (self::$instance->connect_errno) {
                die('Erro MariaDB!');
            }

            self::$instance->set_charset("utf8");
        }

        return self::$instance;
    }

    public static function lastIdInserted(): int
    {
        if (!isset(self::$instance)) {
            die('Erro MariaDB!');
        }

        return self::$instance->insert_id;
    }

    public static function startTransaction(): void
    {
        self::conn();

        self::$instance->query('SET autocommit = 0;');
        self::$instance->query('START TRANSACTION;');
    }

    public static function commit(): void
    {
        self::$instance->query('COMMIT;');
        self::$instance->query('SET autocommit = 1;');
    }

    public static function rollback(string $message): void
    {
        self::$instance->query('ROLLBACK;');
        self::$instance->query('SET autocommit = 1;');
    }
}
