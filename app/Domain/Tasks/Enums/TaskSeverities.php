<?php

namespace App\Domain\Tasks\Enums;

use App\Helpers\BaseEnum;

enum TaskSeverities : string
{
    use BaseEnum;
    case High = "high";
    case Medium = "medium";
    case Low = "low";
}
