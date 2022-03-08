<?php

namespace App\Model;

use App\Kernel\DBConnection;
use App\Kernel\Model\BaseModel;
use App\Model\Exception\UserNotFoundException;

class Image extends BaseModel
{
    protected int $id;
    protected string $name;
    protected int $productId;
    protected int $isMain;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getIsMain(): int
    {
        return $this->isMain;
    }

    public function setIsMain(int $isMain): void
    {
        $this->isMain = $isMain;
    }

    public static function getTableName(): string
    {
        return 'image';
    }

    public static function findByProductId(string $id): Array|Static
    {
        $connection = new DBConnection();
        $images = $connection->query(
            sprintf("SELECT * FROM image WHERE product_id='%s'", $id),
            static::class
        );

        return $images;
    }
}