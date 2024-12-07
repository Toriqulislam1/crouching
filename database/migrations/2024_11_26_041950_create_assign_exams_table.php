<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('SubjectId');
            $table->integer('BatchId');
            $table->integer('ExamTime');
            $table->integer('examDate');
            $table->json('question');
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
        Schema::dropIfExists('assign_exams');
    }
}