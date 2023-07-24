<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity');
            // $table->unsignedBigInteger('size_id')->nullable();
            // $table->unsignedBigInteger('custom_lembar_id')->nullable();
            $table->string('total');
            $table->text('warna')->nullable();
            $table->text('kartu_ucapan')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade');
            // $table->foreign('custom_lembar_id')->references('id')->on('custom_lembar')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
