<?php

namespace App\Enums;


enum StatementStatus: string
{
    case Complete = "complete";
    case NotComplete = 'not_complete';
}
