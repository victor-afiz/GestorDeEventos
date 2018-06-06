<?php

namespace App\Domain\Model\SizeType;

class SizeType
{
    const NUMERIC = 'NUMERIC';
    const ALPHABETIC = 'ALPHABETIC';

    const SIZE_TYPE = [
        'NUMERIC' => self::NUMERIC,
        'ALPHABETIC' => self::ALPHABETIC
    ];

}
