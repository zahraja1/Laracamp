<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_bootcamps')->insert(array(
            array(
                'kategori'=>'international',
                'slug'=>'international',
            ),
            array(
                'kategori'=>'Home Alone',
                'slug'=>'home-alone',
            ),
            array(
                'kategori'=>'Jay',
                'slug'=>'jay',
            ),
            array(
                'kategori'=>'Ara Canteqq',
                'slug'=>'ara-canteeq',
            ),
        ));
    }
}
