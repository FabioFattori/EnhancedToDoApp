<?php

namespace App\Domain\UserTaskCollections\Enums;

use App\Helpers\BaseEnum;

enum UserAbilities : string
{
    use BaseEnum;

    case Write = 'write';
    case Read = 'read';
    case Creator = 'creator';
}
