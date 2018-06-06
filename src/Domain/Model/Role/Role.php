<?php

namespace App\Domain\Model\Role;

class Role
{
    const ADMIN = 'ADMIN';
    const CURRENT_MANAGER = 'CURRENT MANAGER';

    const ROLES = [
        'ADMIN' => self::ADMIN,
        'CURRENT MANAGER' => self::CURRENT_MANAGER
    ];
}
