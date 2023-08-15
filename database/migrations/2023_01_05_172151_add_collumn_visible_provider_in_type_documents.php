<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnVisibleProviderInTypeDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_documents', function (Blueprint $table) {
            $table->integer('visible_provider')->default(0);
            $table->integer('visible_customer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('type_documents', function (Blueprint $table) {
        //     $table->dropColumn('visible_provider');
        // });
    }
}
