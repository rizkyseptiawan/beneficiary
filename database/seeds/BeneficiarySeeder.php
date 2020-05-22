<?php

use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Beneficiary::create([
            'nama_penerima' => 'Joko susilo',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Zubaedah',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sodhikin',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Subhan',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Andi Ali',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sutopo',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sumarno',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sujarwo',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sumiati',
        ]);
        \App\Beneficiary::create([
            'nama_penerima' => 'Sulastri',
        ]);
    }
}
