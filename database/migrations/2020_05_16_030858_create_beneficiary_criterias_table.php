<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_criterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funds_assistance_period_id');
            $table->unsignedBigInteger('beneficiary_id');
            $table->unsignedBigInteger('criteria_id');
            $table->unsignedDecimal('nilai');
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
        Schema::dropIfExists('beneficiary_criterias');
    }
}
