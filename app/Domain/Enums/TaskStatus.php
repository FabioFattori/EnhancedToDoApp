<?php

namespace App\Domain\Enums;

enum TaskStatus : string
{
    case ToBeDone = "To be done";
    case Done = "Done";
    case Cancelled = "Cancelled";
    case Doing = "Doing";
}
