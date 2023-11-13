<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('logo')->nullable();
            $table->string('batch')->nullable();
            $table->string('name')->nullable();
            $table->enum('type', ['Digital', 'Kriya', 'Animasi'])->nullable();
            $table->string('bussinessEntity')->nullable();
            $table->string('desc')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('other')->nullable();
            $table->string('website')->nullable();
            $table->string('companyLink')->nullable();
            $table->string('address')->nullable();
            $table->enum('role', ['Tenant']);
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
        Schema::dropIfExists('tenants');
    }
};
