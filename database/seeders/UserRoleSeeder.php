<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Officer;
use App\Models\Sales;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $officer = Officer::create([
            'id_user' => (string) Str::uuid(),
            'nama_user' => 'Admin Officer',
            'username' => 'officer1',
            'password' => Hash::make('admin123'),
            'level' => 1
        ]);

        User::create([
            'name' => 'Admin Officer',
            'username' => 'officer1',
            'email' => 'officer1@example.com',
            'password' => Hash::make('admin123'),
            'userable_id' => $officer->id_user,
            'userable_type' => Officer::class,
        ]);

        for ($i = 1; $i <= 2; $i++) {
            $sales = Sales::create([
                'id_sales' => (string) Str::uuid(),
                'tgl_sales' => now(),
                'id_customer' => null,
                'do_number' => null,
                'status' => 'unpaid',
            ]);

            User::create([
                'name' => "Sales $i",
                'username' => "sales$i",
                'email' => "sales$i@example.com",
                'password' => Hash::make('admin123'),
                'userable_id' => $sales->id_sales,
                'userable_type' => Sales::class,
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            $customer = Customer::create([
                'id_customer' => (string) Str::uuid(),
                'nama_customer' => "Customer $i",
                'alamat' => "Address $i",
                'telp' => "12345678$i",
                'fax' => "87654321$i",
                'email' => "customer$i@example.com",
            ]);

            User::create([
                'name' => "Customer $i",
                'username' => "customer$i",
                'email' => "customer$i@example.com",
                'password' => Hash::make('admin123'),
                'userable_id' => $customer->id_customer,
                'userable_type' => Customer::class,
            ]);
        }
    }
}
