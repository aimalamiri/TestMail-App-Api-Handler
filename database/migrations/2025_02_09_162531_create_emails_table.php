<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('email_id')->unique()->index();
            $table->string('name')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('subject')->nullable();
            $table->text('text')->nullable();
            $table->longText('html')->nullable();
            $table->dateTime('date')->nullable();
            $table->json('headers')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emails');
    }
};
