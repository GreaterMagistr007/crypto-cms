<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public static function getAdminUserByUserId(?int $userId)
    {
        $userId = (int)$userId;
        if (!$userId) {
            return null;
        }
        return self::where('userid', $userId)->first();
    }
}
