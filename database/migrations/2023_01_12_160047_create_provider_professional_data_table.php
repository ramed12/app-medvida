<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderProfessionalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_professional_data', function (Blueprint $table) {
            $table->id();
            $table->string('crm')->unique();
            $table->string('bank_name');  
            $table->string('salary_account');  
            $table->string('agency');  
            $table->unsignedBigInteger('providers_id');
            $table->foreign('providers_id')->references('id')->on('providers');
            $table->unsignedBigInteger('specialties_id');
            $table->foreign('specialties_id')->references('id')->on('specialties');        
            $table->integer('status')->nullable();          
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
        Schema::dropIfExists('provider_professional_data');
    }
}
