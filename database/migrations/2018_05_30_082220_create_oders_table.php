<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('sub_total');
            $table->integer('ship');
            $table->integer('ship_cost');
            $table->string('gift');
            $table->string('gift_message');
            $table->string('delivery_contact');
            $table->integer('delivery_phone');
            $table->string('delivery_address');
            $table->string('billing_contact');
            $table->integer('billing_phone');
            $table->string('billing_address');
            $table->text('notes');
            $table->longText('status');
            $table->string('paid');
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
        Schema::dropIfExists('oders');
    }
}
