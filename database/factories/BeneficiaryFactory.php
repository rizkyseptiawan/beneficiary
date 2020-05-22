<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Beneficiary;
use Faker\Generator as Faker;

$factory->define(Beneficiary::class, function (Faker $faker) {

    return [
        'nama_penerima' => $faker->name,
        'nomor_ktp' => $faker->nik,
        'nomor_induk_keluarga' => $faker->nationalIdNumber,
        'nomor_rekening' => $faker->bankAccountNumber,
        'nomor_telpon' => $faker->mobileNumber,
        'alamat_asal' => $faker->address,
        'alamat_domisili' => $faker->address,
        'jenis_kelamin' => 'Pria',
        'tanggal_lahir' => $fakert->dateTime,
    ];
});
