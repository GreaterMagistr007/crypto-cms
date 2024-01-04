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
        Schema::create('admins', function (Blueprint $table) {
            $table->integer('userid')->unique(); // id пользователя из таблицы Users
            $table->string('code')->nullable(); // Код подтверждения
            $table->timestamp('code_date')->nullable(); // Дата отправки кода
            $table->string('code_date')->nullable(); // Дата отправки кода
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
