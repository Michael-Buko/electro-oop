<?php
declare(strict_types=1);

namespace App\Kernel;

class DBConnection
{
    private \PDO $connection;

    public function __construct()
    {
        $config = Config::getDbSettings();
        $this->connection = new \PDO(
            sprintf('mysql:dbname=%s;host=%s;port=%s', $config['name'], $config['host'], $config['port']),
            $config['user'],
            $config['password']
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