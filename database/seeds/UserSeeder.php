<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); //Menghapus seluruh data dalam tabel

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'author',
            'email' => 'author@author',
            'password' => bcrypt('secret'),
        ]);
    }
}
