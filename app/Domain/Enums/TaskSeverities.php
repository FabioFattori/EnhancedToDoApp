<?php

namespace App\Domain\Enums;

enum TaskSeverities : string
{
    case High = "high";
    case Medium = "medium";
    case Low = "low";
}
