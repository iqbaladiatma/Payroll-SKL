<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Datakaryawan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetupKaryawanLogin extends Command
{
  protected $signature = 'karyawan:setup-login';
  protected $description = 'Setup login credentials for Data Karyawan';

  public function handle()
  {
    $karyawan = Datakaryawan::all();

    foreach ($karyawan as $k) {
      // Check if user already exists
      $user = User::where('email', $k->email)->first();

      if (!$user) {
        User::create([
          'name' => $k->nama,
          'email' => $k->email,
          'password' => Hash::make('123456'),
          'usertype' => 'user'
        ]);
        $this->info("Created login for: {$k->nama}");
      } else {
        $this->info("Login already exists for: {$k->nama}");
      }
    }

    $this->info('Setup completed!');
  }
}
