<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_company');
            $table->foreign('id_company')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('id_employee');
            $table->foreign('id_employee')->references('id')->on('employees')->onDelete('cascade');

            $table->bigInteger('balance');
            $table->bigInteger('company_start_balance');
            $table->bigInteger('company_last_balance');
            $table->bigInteger('employees_start_balance');
            $table->bigInteger('employees_last_balance');
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
        Schema::dropIfExists('histories');
    }
}
