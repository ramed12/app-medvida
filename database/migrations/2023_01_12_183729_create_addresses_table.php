<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user')->nullable();
            $table->unsignedBigInteger('providers_id')->nullable();
            $table->foreign('providers_id')->references('id')->on('providers')->nullable();
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->foreign('administrator_id')->references('id')->on('administrators')->nullable();   
            $table->string('street', 100);
            $table->string('number', 45);
            $table->string('complement', 100)->nullable();
            $table->string('neighborhood', 45);
            $table->string('city', 45);
            $table->string('state', 45);
            $table->string('country', 45);
            $table->string('zipcode', 45);

            $table->softDeletes();
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
        Schema::dropIfExists('addresses');
    }
}
