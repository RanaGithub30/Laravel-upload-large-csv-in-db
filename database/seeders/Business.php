<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessSurvey;
use Illuminate\Support\Str;

class Business extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10000; $i++){
            BusinessSurvey::create([
                'description' => Str::random(40),
                'industry' => Str::random(20),
                'level' => Str::random(20),
                'size' => Str::random(20),
                'line_code' => Str::random(20),
                'value' => Str::random(30),
                'created_at' => date('d-m-Y h:i:s'),
                'updated_at' => date('d-m-Y h:i:s')
            ]);
        }
    }
}
