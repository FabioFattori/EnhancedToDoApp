<?php

namespace App\Domain\Tasks\Enums;

use App\Helpers\BaseEnum;

enum TaskStatus : string
{
    use BaseEnum;

    case ToBeDone = "To be done";
    case Done = "Done";
    case Cancelled = "Cancelled";
    case Doing = "Doing";
}
