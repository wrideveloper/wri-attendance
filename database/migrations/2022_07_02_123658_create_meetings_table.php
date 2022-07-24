<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('miniclasses_id')->constrained();
            $table->string('topik');
            $table->date('tanggal');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('pertemuan');
            $table->string('token', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        /**Schema::table('meetings', function (Blueprint $table) {
        *    $table->dropForeign(['Miniclass-id']);
        * });
        */
        Schema::dropIfExists('Meetings');
    }
}
