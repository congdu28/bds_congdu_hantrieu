<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $arrUser = [];
       
        // Lặp tạo 10 data bằng hàm array_push
        for($i=0; $i<15; $i++){
            array_push($arrUser,
            [
                "user_name" => "Trương Công Dự $i" ,
                "email" => "congdu$i@gmail.com",
                "password"=>Hash::make('123456'),
                "phone_number" => "0987654312$i",
                "introduce" => "Mảnh đất rất đẹp ",
                "created_at" => date('Y-m-d H-i-s'),
                "updated_at" => date('Y-m-d H-i-s'),
            ]);
        }
        DB::table('users')->insert(
                $arrUser
            );
    }

}
