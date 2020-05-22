<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_penerima');
            $table->string('nomor_ktp')->nullable();
            $table->string('nomor_induk_keluarga')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nomor_telpon')->nullable();
            $table->text('alamat_asal')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->enum('jenis_kelamin',['Pria','Wanita'])->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
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
        Schema::dropIfExists('beneficiaries');
    }
}
