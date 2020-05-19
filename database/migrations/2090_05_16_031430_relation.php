<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financial_submissions', function (Blueprint $table) {
            $table->foreign('funds_assistance_period_id')->references('id')->on('funds_assistance_periods')->onDelete('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
        });
        Schema::table('financial_submission_details', function (Blueprint $table) {
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->foreign('financial_submission_id')->references('id')->on('financial_submissions')->onDelete('cascade');
        });
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('sub_criterias', function (Blueprint $table) {
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
