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
        Schema::create('app_organization_financial_year', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->year('starting_year');
            $table->year('ending_year');
            $table->enum('status', ['Draft','Active', 'Inactive'])->default('Draft');
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
        Schema::dropIfExists('app_organization_financial_year');
    }
};
