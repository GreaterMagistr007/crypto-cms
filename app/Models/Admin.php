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
        $codeLength = Helper::generateRandomInteger(3, 6);
        $code = Helper::generateRandomNumericString($codeLength);

        $this->code = $code;
        $this->code_date = Carbon::now();

        $this->save();

        return $code;
    }

    public function resetCodeForAuth()
    {
        $this->code = null;
        $this->code_date = null;

        $this->save();
    }

    public function checkAuthCode(string $code)
    {
        if (strlen($code) < 2) {
            return false;
        }

        // Тут надо проверить еще время после отправки кода

        if ($this->code === $code) {
            // Код верный, сохраним
            $this->date_until_access_to_admin_panel = Carbon::now()->addMinutes(env('ADMIN_ACTIVE_MINUTES_AFTER_LOGIN'));
            $this->save();

            return true;
        }

        return false;
    }
}
