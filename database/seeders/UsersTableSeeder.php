<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama'       => 'Syaifur Rijal Syamsul',
            'username'   => 'syaifur.rijal',
            'email'      => 'syaifur.rijal@bps.go.id',
            'password'   => bcrypt('ipulmisaja7600'),
            'unit_kerja' => 'BPS Provinsi Sulawesi Barat'
        ]);

        $admin->assignRole('admin');

        $sulbar = User::create([
            'nama'       => 'Tim RB Sulbar',
            'username'   => 'rb7600',
            'email'      => 'bps7600@bps.go.id',
            'password'   => bcrypt('rb7600user'),
            'unit_kerja' => 'BPS Provinsi Sulawesi Barat'
        ]);

        $sulbar->assignRole('user');
    }
}
