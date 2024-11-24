<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title','100');
            $table->string('short_title','100');
            $table->float('price');
            $table->float('discount_amount')->default('0');
            $table->integer('discount_percent')->default('0');
            $table->float('final_price');
            $table->longText('feature');
            $table->tinyInteger('status')->default('1')->comment('1 is active');
            $table->timestamps();

            $table->index('title'); // Single column index
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
