<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $roles = [
            ['name' => 'Admin', 'description' => 'Administrator'],
            ['name' => 'Muzaki', 'description' => 'Muzaki'],
            ['name' => 'DKM', 'description' => 'Pengurus Administari Masjid']
        ];

        // Insert data ke tabel roles
        DB::table('roles')->insert($roles);
            // Ambil ID dari role 'Admin'
            $adminRoleId = DB::table('roles')->where('name', 'Admin')->value('id');
            // Ambil ID dari role 'Muzaki'
            $muzakiRoleId = DB::table('roles')->where('name', 'Muzaki')->value('id');
            // Ambil ID dari role 'DKM'
            $dkmRoleId = DB::table('roles')->where('name', 'DKM')->value('id');

        $mosques = [
            ['name_mosque' => 'Darul Ilmi', 'address_mosque' => 'Kota Depok'],
            ['name_mosque' => 'Al Barokkah', 'address_mosque' => 'Kota Bekasi']
        ];

        // Insert data ke tabel mosques
        DB::table('mosques')->insert($mosques);
            // Ambil ID dari Mosque
            $DarulMosqueId = DB::table('mosques')->where('name_mosque', 'Darul Ilmi')->value('id');
            // Ambil ID dari Mosque
            $barokahMosqueId = DB::table('mosques')->where('name_mosque', 'Al Barokkah')->value('id');

        DB::table('users')->insert([
            'name' => 'Admin ZIS',
            'email' => 'admin@zis.com',
            'password' => Hash::make('admin'),
            'id_role' => $adminRoleId,
            'id_mosque' => null,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Muhamad Ridwan',
            'email' => 'ridwanwan@gmail.com',
            'password' => Hash::make('ridwan'),
            'id_role' => $muzakiRoleId,
            'id_mosque' => $DarulMosqueId,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Ilham syah',
            'email' => 'ilhamsyah@gmail.com',
            'password' => Hash::make('ilham'),
            'id_role' => $dkmRoleId,
            'id_mosque' => $barokahMosqueId,
            'created_at' => now(), 
            'updated_at' => now()
        ]);
    }
}
