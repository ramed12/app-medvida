<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('providers_id');
            $table->foreign('providers_id')->references('id')->on('providers');
            $table->unsignedBigInteger('type_documents_id');
            $table->foreign('type_documents_id')->references('id')->on('type_documents');
            $table->string('name');
            $table->string('anex');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('provider_documents');
    }
}
