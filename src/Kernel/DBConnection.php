<?php
declare(strict_types=1);

namespace App\Kernel;

class DBConnection
{
    private const DB_HOST = 'localhost';
    private const DB_PORT = '3306';
    private const DB_USER = 'homestead';
    private const DB_PASSWORD = 'secret';
    private const DB_NAME = 'electro';

    private \PDO $connection;

    public function __construct()
    {
        $this->connection = new \PDO(
            sprintf('mysql:dbname=%s;host=%s;port=%s', self::DB_NAME, self::DB_HOST, self::DB_PORT),
            self::DB_USER,
            self::DB_PASSWORD
        );
    }

    public function query(string $sql, string $className, array $parameters = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($parameters);

        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, $className);
        if (empty($result)) {
            return [];
        }
        return $result;
//        return count($result) > 1 ? $result : current($result);
    }

    public function execute(string $query, array $params): void
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
    }
}