<?php

namespace App\Enums;


enum StatementStatus: string
{
    case Complete = "complete";
    case InProcess = "in_process";
    case NotComplete = 'not_complete';
}
