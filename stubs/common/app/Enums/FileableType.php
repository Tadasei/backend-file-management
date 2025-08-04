<?php

namespace App\Enums;

use App\Models\User;

enum FileableType: string
{
	case User = User::class;
}
