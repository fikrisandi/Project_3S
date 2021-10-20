# Project_3S
## todo
- admin seeder
- testing role admin / user
- Jadi minggu ini untuk backend buat fitur halaman admin untuk mengedit data yang masuk dari user, meliputi table pekerjaan, meet, pembayaran


- menampilkan semua data pekerjaan 
- menampilkan semua data meet
- menampilkan semua data pembayaran

Route
Route::get('\admin-dashboard', [])

Controller
index() {
  Pekerjaan::
  Meet::
  Pembayaran::

  return view('...', compact[Pekerjaan, Meet, Pembayaran])
}

- menampilkan data per pekerjaan (halaman buat ubah)
- menampilkan data per meet (halaman buat ubah)
- menampilkan data per pembayaran (halaman buat ubah)

struktur file controller
Admin (v_2)
  ViewController.php
  UpdateController.php
  DeleteController.php
  CreateController.php

Admin (v_1)
  Controller.php
User
  Controller.php
Pekerjaan
  Controller.php
  kategori
    Controller.php
  status
    Controller.php
  meet
    Controller.php
  pembayaran
    Controller.php
  

php artisan make:controller Admin/ViewController
php artisan make:controller User/ViewController
php artisan make:controller Pekerjaan/ViewController
php artisan make:controller Pekerjaan/Kategori/ViewController
php artisan make:controller Pekerjaan/Status/ViewController
php artisan make:controller Pekerjaan/Meet/ViewController
php artisan make:controller Pekerjaan/Pembayaran/ViewController

# membuat data dummy
1. membuat factory untuk tiap Model nya
2. membuat seeder yang memanggil factory
3. $this->call(NamaSeeder::class);   <- copy code ini ke DatabaseSeeder.php


$pekerjaan = Pekerjaan::all();
$meet = PekerjaanMeet::all();
$status = PekerjaanStatus::all();
$kategori = PekerjaanKategori::all();
$pembayaran = PekerjaanPembayaran::all();

php artisan make:factory PekerjaanFactory
php artisan make:factory PekerjaanMeetFactory
php artisan make:factory PekerjaanStatusFactory
php artisan make:factory PekerjaanKategoriFactory
php artisan make:factory PekerjaanPembayaranFactory

To do
- Admin bisa nampilin data dari user dibuat klik (button) -> relasi status dan kategori (done)
- Admin bisa mengedit, update data dari user yang sudah diinputkan (done)


To do 
- Dashboard User
- Tahap2 Pekerjaan
- User mengisi data pribadi ketika register
- dan ketika login nanti akan langsung ke dashboard

menyimpan nama file saja di db