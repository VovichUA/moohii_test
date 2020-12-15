<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('parent_id')->nullable();
            $table->text('question');
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->uuid('user_id')->nullable();
            $table->unsignedInteger('question_id');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
    }
}
