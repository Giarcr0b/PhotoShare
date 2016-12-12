<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('bio')->default('About you...');
            $table->string('profile_pic')->default('default.jpg');
            $table->enum('user_type', ['Admin', 'Photographer', 'Shopper'])->default('Photographer');
            $table->enum('chat_access', ['yes', 'no'])->default('no');
            $table->enum('authorised', ['yes', 'no'])->default('no');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
