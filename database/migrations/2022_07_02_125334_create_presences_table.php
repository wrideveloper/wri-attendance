<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meetings_id')->constrained();
            $table->string('nim', 10);
            $table->date('presence_date');
            $table->string('status');
            $table->string('ket')->nullable();
            $table->string('token', 10);
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
