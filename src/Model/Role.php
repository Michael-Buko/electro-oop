<?php

namespace App\Model;

use App\Kernel\Model\BaseModel;

class Role extends BaseModel
{
    protected int $id;
    protected string $role;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public static function getTableName(): string
    {
        return 'role';
    }
}