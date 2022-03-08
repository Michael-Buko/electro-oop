<?php

namespace App\Model;

use App\Kernel\DBConnection;
use App\Kernel\Model\BaseModel;
use App\Model\Exception\UserNotFoundException;

class User extends BaseModel
{
    protected int $id;
    protected string $email;
    protected string $password;
    protected int $roleId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public static function getTableName(): string
    {
        return 'user';
    }

    public static function findByEmail(string $email): ?User
    {
        $connection = new DBConnection();
        $user = $connection->query(
            sprintf("SELECT * FROM user WHERE email='%s'", $email),
            static::class
        );

        if (!($user instanceof User)) {
            throw new UserNotFoundException('Неверный логин или пароль');
        }

        return $user;
    }
}