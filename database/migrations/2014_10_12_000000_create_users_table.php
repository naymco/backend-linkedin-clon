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
            $table->bigIncrements('id');
            $table->string('role', 20)->nullable();
            $table->string('name');
            $table->string('surname', 100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('address', 255)->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country', 20)->nullable();
            $table->integer('phone')->nullable();
            $table->string('password');
            $table->string('image', '255')->nullable();
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
        Schema::dropIfExists('users');
    }
}
