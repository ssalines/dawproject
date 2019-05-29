<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('operation_type')->nullable();
            $table->text('exp_name')->nullable();
            $table->text('exp_country')->nullable();
            $table->text('imp_name')->nullable();
            $table->text('imp_country')->nullable();
            $table->text('role')->nullable();
            $table->text('item')->nullable();
            $table->text('currency')->nullable();
            $table->integer('price')->nullable();
            $table->text('transport')->nullable();
            $table->text('incoterm')->nullable();
            $table->text('payment')->nullable();
            $table->text('insurance_carrier')->nullable();
            $table->text('legislation')->nullable();
            $table->text('documents')->nullable();
            $table->text('language')->nullable();
            $table->text('contract')->nullable();
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
        Schema::dropIfExists('operations');
    }
}
