<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('to_id');
            $table->foreign('to_id')->references('id')->on('users');
            $table->unsignedInteger('step_id');
            $table->foreign('step_id')->references('id')->on('steps');
            $table->unsignedInteger('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('files');
            $table->string('affair');
            $table->string('message');
            $table->timestamps();

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
        Schema::disableForeignKeyConstraints();
    }
}
