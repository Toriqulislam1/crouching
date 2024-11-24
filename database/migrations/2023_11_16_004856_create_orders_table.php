<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->bigInteger('order_id');
            $table->decimal('total_amount', 10, 2);
            $table->float('discount')->default('0');
            $table->string('status','23')->default('unpaid');
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_ref_id')->nullable();
            $table->string('page_url')->nullable();
            $table->string('post_url')->nullable();
            $table->string('platform')->nullable();
            $table->text('address2')->nullable();
            $table->text('note')->nullable();
            $table->text('slip_image')->nullable();
            $table->string('payment_status')->default('panding');
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
        Schema::dropIfExists('orders');
    }
}