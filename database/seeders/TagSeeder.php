<?php

namespace Database\Seeders;

use App\Models\tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(array(
            array(
                'tags'=>'international',
                'slug'=>'international',
            ),
            array(
                'tags'=>'Home Alone',
                'slug'=>'home-alone',
            ),
            array(
                'tags'=>'Jay',
                'slug'=>'jay',
            ),
            array(
                'tags'=>'Ara Canteqq',
                'slug'=>'ara-canteeq',
            ),
        ));
    }
}
