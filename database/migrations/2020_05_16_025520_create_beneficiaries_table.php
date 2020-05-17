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
            $table->unsignedBigInteger('user_id');
            $table->string('nama_penerima');
            $table->string('nomor_ktp');
            $table->string('nomor_induk_keluarga');
            $table->string('nomor_rekening');
            $table->string('nomor_telpon');
            $table->text('alamat_asal');
            $table->text('alamat_domisili');
            $table->enum('jenis_kelamin',['Pria','Wanita']);
            $table->dateTime('tanggal_lahir');
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
