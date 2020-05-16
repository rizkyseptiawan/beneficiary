<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsAssistancePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds_assistance_periods', function (Blueprint $table) {
            $table->id();
            $table->string('periode_bantuan');
            $table->enum('jenis_bantuan',['dana','sembako']);
            $table->string('item_bantuan');
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
        Schema::dropIfExists('funds_assistance_periods');
    }
}
