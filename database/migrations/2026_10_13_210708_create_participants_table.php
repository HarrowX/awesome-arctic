<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('vk_id')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('birthday');
            $table->json('contact_info')->nullable();
            $table->string('avatar')->nullable();
            $table->string('agreement')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
