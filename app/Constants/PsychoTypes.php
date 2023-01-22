<?php

declare(strict_types=1);

namespace App\Constants;

class PsychoTypes
{
    public const TYPE_MIRANDA_PRIESTLY = 1;
    public const TYPE_DAPHNE_BRIDGERTON = 2;
    public const TYPE_SCARLETT_O_HARA = 3;

    public const ALL = [
        self::TYPE_MIRANDA_PRIESTLY,
        self::TYPE_DAPHNE_BRIDGERTON,
        self::TYPE_SCARLETT_O_HARA,
    ];

    public const SLUGS = [
        self::TYPE_MIRANDA_PRIESTLY => 'miranda-priestly',
        self::TYPE_DAPHNE_BRIDGERTON => 'daphne-bridgerton',
        self::TYPE_SCARLETT_O_HARA => 'scarlett-o-hara',
    ];
}
