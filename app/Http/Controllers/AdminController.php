<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Helper;
use App\Models\Telegram;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        dd('admin index');
    }

    public function sendTelegramCodeForAuth()
    {
        $adminData = Admin::getUserAdminData();
        $code = $adminData->generateCodeForAuth();

        // Отправим код в телеграм
        $tlgMsg = [
            "Код для авторизации пользователя: <b>$code</b>"
        ];
        Telegram::sendAdminChatMessage($tlgMsg);

        return redirect(route('get__admin_index'));
    }

    public function checkAuthCode(string $code)
    {
        dd('Проверяем код ' . $code);
    }
}
