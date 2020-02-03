<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role', 20)->nullable()->default('company');
            $table->string('name')->unique();
            $table->string('about_us')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('cif')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('address', 255)->nullable();
            $table->string('web_page')->nullable();
            $table->integer('zip_code')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
