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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->integer("TrackingNumber");
            $table->string('Package_name');
            $table->string('Name_Sender');
            $table->string('Address_Sender');
            $table->string('Name_Reciever');
            $table->string('Address_Reciever');
            $table->date('Date');
            $table->string('Dimensions');
            $table->integer('Weight');
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
        Schema::dropIfExists('label');
    }
};
