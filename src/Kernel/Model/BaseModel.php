<?php

namespace App\Kernel\Model;

use App\Kernel\DBConnection;

abstract class BaseModel
{
    abstract public static function getTableName(): string;

    public static function findAll(array $columns = []): array
    {
        $connection = new DBConnection();
        $columnList = !empty($columns) ? implode(',', $columns) : '*';
        return $connection->query(
            sprintf('SELECT %s FROM %s', $columnList, static::getTableName()),
            static::class
        );
    }

    public static function findAllJoin(): array
    {
        $connection = new DBConnection();
        return $connection->query(
            'SELECT product.id, product.name, cost, category.name AS category, discount, image.name AS image_name 
                    FROM product
                    LEFT OUTER JOIN image ON product.id = image.product_id
                    LEFT OUTER JOIN category ON category_id = category.id
                    WHERE image.is_main <> 0
                    ORDER BY product.name',
            static::class
        );
    }

    public static function findById(int $id): static|bool
    {
        $connection = new DBConnection();
        $data = $connection->query(
            sprintf('SELECT * FROM %s WHERE id=%s', static::getTableName(), $id),
            static::class
        );
        return current($data);
    }

    public function __set(string $name, $value): void
    {
        $propertyName = $this->underscoreToCamelCase($name);
        $this->$propertyName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace("/[A-Z]/", "_$0", lcfirst($source)));
    }
}