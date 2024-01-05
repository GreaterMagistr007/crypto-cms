<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
    use HasFactory;

    public static function sendAdminChatMessage($arrayOfStrings = [])
    {
        foreach ($arrayOfStrings as $string) {
            if (!is_string($string)) {
                throw new \DomainException('Каждая строка в сообщении должна быть СТРОКОЙ');
            }
        }

        $chatId = env('ADMIN_CHAT_ID');
        $telegramBotToken = env('ADMIN_AUTH_BOT_TOKEN');
        $text = implode("\r\n", $arrayOfStrings);

        self::sendMessage($text, $chatId, $telegramBotToken);
    }

    /**
     * Отправляет сообщение в телеграм
     * @param string $text - строка сообщения
     * @param string $chatId - id чата, куда бот будет отправлять сообщение
     * @param string $telegramBotToken - токен бота, который будет отправлять сообщение
     * @return void
     */
    private static function sendMessage(string $text, string $chatId, string $telegramBotToken): void
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . $telegramBotToken . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => $chatId,
                    'text' => $text,
                    'parse_mode' => 'HTML',     //Форматировать как HTML
                ),
            )
        );
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
//            // Обработка ошибок
//            echo 'Curl error: ' . curl_error($ch);
//            dd(
//                'Ошибка: ', curl_error($ch),
//                $response
//            );
        }
    }
}
