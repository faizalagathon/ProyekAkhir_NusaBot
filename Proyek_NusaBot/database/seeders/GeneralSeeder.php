<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Pembimbing_Perusahaan;
use App\Models\Pembimbing_Sekolah;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Faker\Factory as Faker;

class GeneralSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  
  public function run(): void
  {
    // $angkatan = ['10', '11', '12', '13'];
    $faker = Faker::create('id_ID');
    $jurusan = ['RPL1', 'RPL2', 'TKJ1', 'TKJ2'];
    // Admin::create([
    //   'id_a' => Random::generate(10,'0-9'),
    //   'email_a' => 'admin@admin.com',
    //   'password_a' => Hash::make('12345'),
    // ]);
    // foreach ($angkatan as $item){
    //   Kelas::create([
    //     'id_k' => Random::generate(10,'0-9'),
    //     'angkatan_k' => $item,
    //   ]);
    // }
    foreach ($jurusan as $item ) {
      Jurusan::create([
        'id_jurusan' => Random::generate(10,'0-9'),
        'nama_j' => $item,
      ]);
    }
    // for ($i=0; $i < 20; $i++) { 
    //   Perusahaan::create([
    //     'id_p' => Random::generate(10,'0-9'),
    //     'nama_p' => $faker->company,
    //     'alamat_p' => $faker->address,
    //   ]);
    // }
    Pembimbing_Sekolah::create([
      'nip_ps' => Random::generate(10,'0-9'),
      'pass_unhash' => '12345',
      'password_ps' => Hash::make('12345'),
      'nama_ps' => $faker->name('Male'),
      'jk_ps' => 'L',
      'id_jurusan' => Jurusan::where('nama_j', 'RPL2')->get('id_jurusan')->first(),
    ]);
  }
}
