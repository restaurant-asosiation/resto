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
            $table->string('nip')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('telephone', 14)->nullable();
            $table->enum('sex', ['pria', 'wanita'])->nullable();
            $table->date('birth_day')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->enum('employee_status', ['bekerja', 'tidak bekerja'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
