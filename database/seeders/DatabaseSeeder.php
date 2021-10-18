<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use App\Models\PekerjaanKategori;
use App\Models\PekerjaanMeet;
use App\Models\PekerjaanPembayaran;
use App\Models\PekerjaanStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdministratorSeeder::class);
        PekerjaanStatus::factory()
            ->state(['status' => 'state_1'])
            ->create();
        PekerjaanStatus::factory()
            ->state(['status' => 'state_2'])
            ->create();
        PekerjaanStatus::factory()
            ->state(['status' => 'state_3'])
            ->create();
        PekerjaanStatus::factory()
            ->state(['status' => 'state_4'])
            ->create();
        // PekerjaanKategori::factory()->count(3)->create();

        // Pekerjaan::factory()
        //     ->has( PekerjaanMeet::factory() )
        //     ->has( PekerjaanPembayaran::factory() )
        //     ->count(3)
        //     ->create();

        // php artisan db:seed
    }
}