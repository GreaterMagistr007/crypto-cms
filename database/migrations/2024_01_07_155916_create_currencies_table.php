<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();

            $table->string('symbol')->nullable(); // Текстовый символ валюты
            $table->string('image_min')->nullable(); // Картинка маленького символа валюты
            $table->string('title')->nullable(); // Название валюты
            $table->string('purchase_rate')->nullable(); // курс покупки
            $table->string('selling_rate')->nullable(); // курс продажи
            $table->timestamp('last_update_rate')->nullable(); // Время последнего обновления курса
            $table->boolean('is_can_top')->nullable(); // Можно пополнять счет (Для всех пользователей)
            $table->boolean('is_can_withdrawn')->nullable(); // Можно выводить со счета (Для всех пользователей)
            $table->boolean('is_show_on_site')->nullable(); // Отображение на сайте

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
