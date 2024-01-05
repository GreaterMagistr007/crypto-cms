<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use App\Models\Telegram;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        dd('admin index');
    }

    public function send_telegram_code_for_auth()
    {
        $code = Helper::generateRandomNumericString();
        $tlgMsg = [
            'Код для авторизации пользователя: <b></b>'
        ];
        Telegram::
        dd('admin send_telegram_code_for_auth');
    }
}
