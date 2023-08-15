<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->decimal('value');
            $table->decimal('increase_per_dependent')->nullable();
            $table->integer('number_medical_appointments')->nullable()->default('1');
            $table->integer('addition_medical_consultation')->nullable()->default('0');
            $table->decimal('surcharge_addition_medical_consultation')->nullable();
            $table->string('image')->nullable();
            $table->char('status', 1)->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
