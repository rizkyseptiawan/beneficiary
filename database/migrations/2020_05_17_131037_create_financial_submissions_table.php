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
            $table->unsignedBigInteger('beneficiary_id');
            $table->unsignedBigInteger('funds_assistance_period_id');
            $table->string('kode_pengajuan')->unique();
            $table->unsignedDecimal('nilai_total_kriteria');
            $table->enum('status_pengajuan',['Pengajuan','Diterima','Belum Berkesempatan'])->default('Pengajuan');
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
