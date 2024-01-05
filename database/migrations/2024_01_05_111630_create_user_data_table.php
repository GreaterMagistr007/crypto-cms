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
        Schema::create('user_data', function (Blueprint $table) {
            $table->bigInteger('userid')->unique()->index('userid'); // id пользователя из таблицы Users
            $table->string('name')->nullable(); // Имя пользователя
            $table->string('phone')->nullable(); // Номер телефона
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
