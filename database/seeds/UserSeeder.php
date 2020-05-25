<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Rizky Septiawan',
                'email' => 'admin@asep.codes',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Penerima Bantuan',
                'email' => 'penerima@asep.codes',
                'password' => Hash::make('penerima123'),
                'role' => 'beneficiary',
            ],
        ];

        foreach ($users as $user) {
            $createdUser = \App\User::create(Arr::except($user,'role'));
            $createdUser->assignRole($user['role']);
            if($user['role'] == 'beneficiary'){
                \App\Beneficiary::create([
                    'user_id' => $createdUser->id,
                    'nama_penerima' => 'Penerima Bantuan',
                ]);
            }
        }
    }
}
