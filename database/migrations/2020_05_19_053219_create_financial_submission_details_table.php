<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialSubmissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_submission_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('financial_submission_id');
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedBigInteger('nilai_kriteria');
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
        Schema::dropIfExists('financial_submission_details');
    }
}
