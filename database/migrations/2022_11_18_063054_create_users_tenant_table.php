<?php

use App\Models\Tenant;
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
        Schema::create('users_tenant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class);
            $table->string('profile')->nullable();
            $table->string('ktp')->nullable();
            $table->string('nik')->unique();
            $table->string('full_name');
            $table->string('short_name');
            $table->string('position')->nullable();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('religion');
            $table->enum('status', ['Menikah', 'Belum Menikah']);
            $table->string('email');
            $table->string('phone');
            $table->enum('education', ['SD/Sederajat', 'SMP/Sederajat', 'SMA/SLTA/Sederajat', 'Diploma I/II/III/IV', 'Sarjana I/II/III']);
            $table->string('address');
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
        Schema::dropIfExists('users_tenant');
    }
};
