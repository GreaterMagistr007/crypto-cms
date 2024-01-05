<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = Auth::user();

        // пользователь не авторизован
        if (!$user) {
            return redirect(route('login'));
        }

        // Пользователь не админ, покажем 404
        $adminData = $user->getAdminData();
        if (!$adminData) {
            dump('Пользователь не админ');
            return response(view('errors.404'));
        }

        $timeNow = Carbon::now()->format('Y-m-d H:i:s');

        // Админка пользователю недоступна, нужно подтверждение кодом
        if (!$adminData->date_until_access_to_admin_panel || $timeNow > $adminData->date_until_access_to_admin_panel) {
            dump('Время пребывания в админке вышло');

            // Дата отправки кода
            $dateCodeSend = Carbon::parse($adminData->code_date);
            // Количество минут после последней отправки кода
            $minutesAfterLastSendCode = Carbon::now()->diffInMinutes($dateCodeSend);
            // Факт отправки кода
            $isCodeSended = $adminData->code && $minutesAfterLastSendCode > env('ADMIN_TIME_TO_ENTER_CODE_MINUTES');

            if (!$isCodeSended && $request->method() === 'PATCH') {
                dd(route('patch__admin_send-auth-code'), $request);
                if ($request->method() === 'PATCH') {
                    dd($request->action);
                }
            }

            return response(view('admin.pages.code', ['isCodeSended' => $isCodeSended, 'minutesAfterLastSendCode' => $minutesAfterLastSendCode]));
        }

        //



        //
        return $next($request);
    }
}
