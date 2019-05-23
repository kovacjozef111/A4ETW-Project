<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('thread_id');
            $table->foreign('thread_id')
                ->references('id')->on('threads')
                ->onDelete('cascade');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->text('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
