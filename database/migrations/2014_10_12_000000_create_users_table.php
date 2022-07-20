<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('miniclass_id')->constrained();
            $table->foreignId('roles_id')->constrained();
            $table->foreignId('generations_id')->constrained();
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('phone',20);
            $table->string('nim',10)->unique();
            $table->timestamp('email_verified_at')->nullable();
            //$table->string('username');
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
