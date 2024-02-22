<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
               'name'   =>'Admin',
               'email'  =>'admin@example.com',
               'type' => 'admin',
               'password' => Hash::make('Admin@123')
            ],
            [
                'name'   =>'User',
                'email'  =>'user@example.com',
                'type' => 'user',
                'password' => Hash::make('User@123')
             ],
        ];
        foreach ($usersData as $key => $val) {
            User::create($val);
        }
    }
}
