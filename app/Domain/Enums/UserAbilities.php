<?php

namespace App\Domain\Enums;

enum UserAbilities : string
{
    case Write = 'write';
    case Read = 'read';
    case Creator = 'creator';
}
