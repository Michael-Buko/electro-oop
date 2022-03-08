<?php

namespace App\Model;

use App\Kernel\Model\BaseModel;

class Product extends BaseModel
{
    protected int $id;
    protected string $name;
    protected string $description;
    protected float $cost;
    protected int $amount;
    protected int $categoryId;
    protected ?int $discount;
    protected string $smallDescription;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function setCost(float $cost): void
    {
        $this->cost = $cost;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    public function getSmallDescription(): string
    {
        return $this->smallDescription;
    }

    public function setSmallDescription(string $smallDescription): void
    {
        $this->smallDescription = $smallDescription;
    }

    public static function getTableName(): string
    {
        return 'product';
    }
}