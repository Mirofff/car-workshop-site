<?php

namespace App\Enums;


enum UserRole: string
{
    case Admin = 'admin';
    case Operator = 'operator';
    case Client = 'client';
}
