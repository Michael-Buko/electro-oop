<?php

namespace App\Model;

use App\Kernel\Model\BaseModel;

class Category extends BaseModel
{
    protected int $id;
    protected string $name;
    protected ?string $image;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public static function getTableName(): string
    {
        return 'category';
    }
}