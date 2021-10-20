<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRecords =[
        	['id'=>1,'name'=>'admin','mobile'=>'04238480204','email'=>'admin@gmail.com','password'=>'$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy','image'=>'','address'=>'dhaka,bangladesh'],
        ];

        DB::table('users')->insert($userRecords);
    }
}
