<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getAdminUserByUserId(?int $userId)
    {
        $userId = (int)$userId;
        if (!$userId) {
            return null;
        }
        return self::where('userid', $userId)->first();
    }

    /**
     * @return Admin|null
     */
    public static function getUserAdminData()
    {
        /** @var User $user */
        $user = request()->user();
        return $user->getAdminData();
    }

    /**
     * Генерируем код авторизации для пользователя
     * @return string
     */
    public function generateCodeForAuth()
    {
        $codeLength = Helper::generateRandomInteger();
        $code = Helper::generateRandomNumericString($codeLength);

        $this->code = $code;
        $this->code_date = Carbon::now();



        $this->save();

        return $code;
    }
}
