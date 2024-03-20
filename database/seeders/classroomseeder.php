<?php

namespace Database\Seeders;

use App\Models\classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class classroomseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker=Faker::create();
        // $class=classroom::insert([
        //     'class_name'=>$faker->name,
        //     'class_desc'=>$faker->paragraph(15),
        // ]);
    }
}
