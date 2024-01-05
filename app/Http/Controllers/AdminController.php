<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        dd('admin index');
    }

    public function send_telegram_code_for_auth()
    {
        dd('admin send_telegram_code_for_auth');
    }
}
