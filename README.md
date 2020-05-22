
## Beneficiary App

Sistem ini merupakan sebuah sistem pendukung pengambilan keputusan yang digunakan untuk menyeleksi calon penerima bantuan sosial bagi masyarakat yang terdampak COVID19 dengan menggunakan Metode Simple Additive Weighting (SAW). Fitur - fitur dari aplikasi ini adalah sebagai berikut.

- Kriteria
- Sub Kriteria
- Permohonan Pengajuan Bantuan
- Pendukung Keputusan Bantuan
- dll

Aplikasi ini dirancang dengan 2 level pengguna , yaitu admin dan penerima bantuan.

## Instalasi
1. Jalankan perintah `composer update` pada direktori utama
2. Buatlah database terlebih dahulu
3. Copy file .env.example menjadi .env menggunakan perintah `cp .env.example .env`
4. Buka file .env dan koneksikan dengan database
5. Jalankan perintah `php artisan key:generate`
6. Jalankan perintah `php artisan migrate --seed` untuk mengisi database

## Akun Untuk masuk kesistem
- Masuk sebagai admin. Gunakan email admin@asep.codes dan password admin123
- Masuk sebagai penerima bantuan. Gunakan email penerima@asep.codes dan password penerima123 

## License

Siapa saja dapat menggunakan, mengedit, dan menyebarkan aplikasi ini [MIT license](https://opensource.org/licenses/MIT).
