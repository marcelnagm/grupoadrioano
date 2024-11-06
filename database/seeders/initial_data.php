<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Agency;
use App\Models\Profile;
use App\Models\TypeOperation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initial_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Profile::create([
           'name' => 'Admin', 
        ]);
        Profile::create([
           'name' => 'User', 
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('admin'),
            'CPF' => rand(10000000000, 99999999999),
            'profile_id' => 1
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@localhost',
            'password' => bcrypt('user'),
            'CPF' => rand(10000000000, 99999999999),
            'profile_id' => 2
        ]);



        TypeOperation::create(['name' => 'deposit'            
        ]);
        TypeOperation::create(['name' => 'trasfer'            
        ]);
        TypeOperation::create(['name' => 'refund'            
        ]);

        Agency::create([
          'name' => 'Banco do Brasil',
        ]);

        Agency::create([
          'name' => 'Caixa Economica',
        ]);

        Account::create([
            'agency_id' => 1,
            'acconunt' => rand(10000000000, 99999999999),
            'user_id' => 1,
            'balance' => 0 
        ]);
        
        Account::create([
            'agency_id' => 1,
            'acconunt' => rand(10000000000, 99999999999),
            'user_id' => 2,
            'balance' => 0 
        ]);

    }
}
