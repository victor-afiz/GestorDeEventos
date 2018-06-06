<?php

namespace App\Domain\Model\Gender;

class Gender
{
    const MALE = 'MALE';
    const FEMALE = 'FEMALE';
    const OTHER = 'OTHER';

    const GENDER = [
        'MALE' => self::MALE,
        'FEMALE' => self::FEMALE,
        'OTHER' => self::OTHER
    ];

}
