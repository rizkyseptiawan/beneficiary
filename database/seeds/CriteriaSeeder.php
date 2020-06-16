<?php

use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = [
            [
                'nama_kriteria' => 'Kondisi Saat Ini',
                'deskripsi_kriteria' => 'Kriteria ini digunakan untuk mengetahui kondisi ekonomi penerima saat ini',
                'bobot' => 20,
                'tipe_bobot' =>'benefit'
            ],
            [
                'nama_kriteria' => 'Zona Terdampak',
                'deskripsi_kriteria' => 'Kriteria ini digunakan untuk mengetahui kondisi daerah persebaran COVID19 calon penerima bantuan',
                'bobot' => 9,
                'tipe_bobot' =>'benefit'
            ],
            [
                'nama_kriteria' => 'Status Perkawinan',
                'deskripsi_kriteria' => 'Kriteria ini bermanfaat untuk mengetahui status pernikahan calon penerima saat ini',
                'bobot' => 10,
                'tipe_bobot' =>'benefit'
            ],
            [
                'nama_kriteria' => 'Jumlah Tanggungan',
                'deskripsi_kriteria' => 'Kriteria ini digunakan untuk mengetahui berapa total tanggungan dalam membiayai anak',
                'bobot' => 14,
                'tipe_bobot' =>'benefit'
            ],
            [
                'nama_kriteria' => 'Umur',
                'deskripsi_kriteria' => 'benefit',
                'bobot' => 12,
                'tipe_bobot' =>'benefit'
            ],
            [
                'nama_kriteria' => 'Jumlah Penghasilan',
                'deskripsi_kriteria' => 'Kriteria ini digunakan untuk mengetahui jumlah penghasilan calon penerima bantuan',
                'bobot' => 18,
                'tipe_bobot' =>'cost'
            ],
            [
                'nama_kriteria' => 'Jenis Pekerjaan',
                'deskripsi_kriteria' => 'Kriteria ini digunakan untuk mengetahui jenis pekerjaan yang dijalankan calon penerima bantuan',
                'bobot' => 17,
                'tipe_bobot' =>'benefit'
            ],
            
        ];
        foreach ($criterias as $criteria) {
            \App\Criteria::create($criteria);
        }

        $subCriteria1 = [
            [
                'criteria_id' => 1,
                'nama_sub_kriteria' => 'Non Domisili dan Menerima Bantuan Lain',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 1,
                'nama_sub_kriteria' => 'Non Domisili dan Tidak Menerima Bantuan',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 1,
                'nama_sub_kriteria' => 'Domisili dan Menerima Bantuan Lain',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 1,
                'nama_sub_kriteria' => 'Domisili dan Tidak Menerima Bantuan',
                'nilai_sub_kriteria' => 4,
            ],
        ];
        $subCriteria2 = [
            [
                'criteria_id' => 2,
                'nama_sub_kriteria' => 'Zona Hijau',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 2,
                'nama_sub_kriteria' => 'Zona Kuning',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 2,
                'nama_sub_kriteria' => 'Zona Merah',
                'nilai_sub_kriteria' => 3,
            ],
        ];
        $subCriteria3 = [
            [
                'criteria_id' => 3,
                'nama_sub_kriteria' => 'Belum Menikah',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 3,
                'nama_sub_kriteria' => 'Menikah',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 3,
                'nama_sub_kriteria' => 'Cerai Hidup',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 3,
                'nama_sub_kriteria' => 'Cerai Mati',
                'nilai_sub_kriteria' => 4,
            ],
        ];
        $subCriteria4 = [
            [
                'criteria_id' => 4,
                'nama_sub_kriteria' => 'Tidak Memiliki Anak',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 4,
                'nama_sub_kriteria' => '1 - 2 Anak',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 4,
                'nama_sub_kriteria' => '3 - 4 Anak',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 4,
                'nama_sub_kriteria' => '>= 5 Anak',
                'nilai_sub_kriteria' => 4,
            ],
        ];
        $subCriteria5 = [
            [
                'criteria_id' => 5,
                'nama_sub_kriteria' => '25 - 30',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 5,
                'nama_sub_kriteria' => '31 - 40',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 5,
                'nama_sub_kriteria' => '41 - 50',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 5,
                'nama_sub_kriteria' => 'Diatas 50',
                'nilai_sub_kriteria' => 4,
            ],
        ];
        $subCriteria6 = [
            [
                'criteria_id' => 6,
                'nama_sub_kriteria' => 'Dibawah Rp. 500.000',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 6,
                'nama_sub_kriteria' => '500.000 - 1.000.000',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 6,
                'nama_sub_kriteria' => '1.000.000 - 1.500.000',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 6,
                'nama_sub_kriteria' => '1.500.000 - 2.000.000',
                'nilai_sub_kriteria' => 4,
            ],
            [
                'criteria_id' => 6,
                'nama_sub_kriteria' => 'Diatas Rp. 2.000.000',
                'nilai_sub_kriteria' => 5,
            ],
        ];
        $subCriteria7 = [
            [
                'criteria_id' => 7,
                'nama_sub_kriteria' => 'Wirausaha',
                'nilai_sub_kriteria' => 1,
            ],
            [
                'criteria_id' => 7,
                'nama_sub_kriteria' => 'Karyawan Swasta',
                'nilai_sub_kriteria' => 2,
            ],
            [
                'criteria_id' => 7,
                'nama_sub_kriteria' => 'Petani',
                'nilai_sub_kriteria' => 3,
            ],
            [
                'criteria_id' => 7,
                'nama_sub_kriteria' => 'Buruh',
                'nilai_sub_kriteria' => 4,
            ],
        ];
        foreach ($subCriteria1 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria2 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria3 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria4 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria5 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria6 as $sub) {
            \App\SubCriteria::create($sub);
        }
        foreach ($subCriteria7 as $sub) {
            \App\SubCriteria::create($sub);
        }
        
    }
}
