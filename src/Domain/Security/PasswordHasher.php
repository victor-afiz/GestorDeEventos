<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 13:50
 */

namespace App\Domain\Security;


interface PasswordHasher
{
    public function codifyPassword(string $password): string;
    public function verifyPassword(string $password, string $hash): bool;
}