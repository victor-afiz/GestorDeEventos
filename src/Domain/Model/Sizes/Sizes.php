<?php

namespace App\Domain\Model\Sizes;

class Sizes
{
    const XS = 'XS';
    const S = 'S';
    const M = 'M';
    const L = 'L';
    const XL = 'XL';
    const XXL = 'XXL';
    const XXXL = 'XXXL';

    const THIRTY_FIVE = 35;
    const THIRTY_SIX = 36;
    const THIRTY_SEVEN = 37;
    const THIRTY_EIGHT = 38;
    const THIRTY_NINE = 39;
    const FORTY = 40;
    const FORTY_ONE = 41;
    const FORTY_TWO = 42;
    const FORTY_THREE = 43;
    const FORTY_FOUR = 44;
    const FORTY_FIVE = 45;
    const FORTY_SIX = 46;
    const FORTY_SEVEN = 47;

    const SIZES = [
        'XS' => self::XS,
        'S' => self::S,
        'M' => self::M,
        'L' => self::L,
        'XL' => self::XL,
        'XXL' => self::XXL,
        'XXXL' => self::XXXL,
        35 => self::THIRTY_FIVE,
        36 => self::THIRTY_SIX,
        37 => self::THIRTY_SEVEN,
        38 => self::THIRTY_EIGHT,
        39 => self::THIRTY_NINE,
        40 => self::FORTY,
        41 => self::FORTY_ONE,
        42 => self::FORTY_TWO,
        43 => self::FORTY_THREE,
        44 => self::FORTY_FOUR,
        45 => self::FORTY_FIVE,
        46 => self::FORTY_SIX,
        47 => self::FORTY_SEVEN
    ];

    const SIZES_NUMERIC = [
        35 => self::THIRTY_FIVE,
        36 => self::THIRTY_SIX,
        37 => self::THIRTY_SEVEN,
        38 => self::THIRTY_EIGHT,
        39 => self::THIRTY_NINE,
        40 => self::FORTY,
        41 => self::FORTY_ONE,
        42 => self::FORTY_TWO,
        43 => self::FORTY_THREE,
        44 => self::FORTY_FOUR,
        45 => self::FORTY_FIVE,
        46 => self::FORTY_SIX,
        47 => self::FORTY_SEVEN
    ];

    const SIZES_ALPHABETIC = [
        'XS' => self::XS,
        'S' => self::S,
        'M' => self::M,
        'L' => self::L,
        'XL' => self::XL,
        'XXL' => self::XXL,
        'XXXL' => self::XXXL
    ];

    const GET_ARRAY_SIZE = [
        'ALPHABETIC' => self::SIZES_ALPHABETIC,
        'NUMERIC' => self::SIZES_NUMERIC
    ];
}
