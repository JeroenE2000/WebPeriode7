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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('deliveryservice');
            $table->foreignId('label_id')->references('id')->on('labels')->onDelete('cascade');
            $table->foreignId('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreignId('parcel_status_id')->references('id')->on('parcel_status')->onDelete('cascade');
            $table->foreignId('receiver_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('parcels');
    }
};
