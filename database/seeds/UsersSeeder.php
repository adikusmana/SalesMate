<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'              => 'adi',
                'email'             => 'adi@skelly.com',
                'password'          =>  bcrypt('12345678'),
                'role_id'           => '1',
                'site_id'           => '1',
                'brand_id'          => '1',
                'vendor_id'         => '1',
                'department_id'     => '1',
                'subdepartment_id'  => '2',
            ],
            [
                'name'              => 'kusmana',
                'email'             => 'kusmana@skelly.com',
                'password'          =>  bcrypt('12345678'),
                'role_id'           => '2',
                'site_id'           => '2',
                'brand_id'          => '2',
                'vendor_id'         => '2',
                'department_id'     => '2',
                'subdepartment_id'  => '4',
            ],

        ];
        foreach($user as $key => $value){
            User::create($value);
        }

    }
}
