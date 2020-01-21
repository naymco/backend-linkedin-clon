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
            $table->string('company_name')->unique();
            $table->string('about_us')->nullable(); ;
            $table->string('image')->nullable(); ;
            $table->integer('cif')->nullable();
            $table->string('email');
            $table->string('web_page')->nullable(); ;
            $table->integer('zip_code')->nullable(); ;
            $table->integer('province_id');
            $table->string('country')->nullable(); ;
            $table->integer('phone')->nullable(); ;
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
        Schema::dropIfExists('company');
    }
}
