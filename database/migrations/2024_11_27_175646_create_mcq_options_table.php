<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcqOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mcq_id'); // Reference to the mcqs table
            $table->string('option_text'); // Option text
            $table->boolean('is_correct')->default(false); // Whether the option is correct
            $table->foreign('mcq_id')->references('id')->on('mcqs')->onDelete('cascade');
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
        Schema::dropIfExists('mcq_options');
    }
}
