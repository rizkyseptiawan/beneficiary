<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_criteria_id');
            $table->unsignedBigInteger('beneficiary_id');
            $table->enum('status_pengajuan',['Diajukan','Diterima','Belum Berkesempatan'])->default('Diajukan');
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
        Schema::dropIfExists('financial_submissions');
    }
}
