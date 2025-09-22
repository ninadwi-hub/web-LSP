<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('infos')->delete();
        
        \DB::table('infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kategori_id' => 1,
                'page_id' => NULL,
                'slug' => 'itb',
                'title' => 'ITB',
                'content' => 'ITB Menerima Penyerahan Dokumen Skema yang Telah Diverifikasi BNSP',
                'description' => NULL,
                'thumbnail' => 'thumbnails/1eenL9DqxbU1vKwKsuKBHJIqDp3OgGs1POXydhnT.jpg',
                'views' => 0,
                'is_active' => 1,
                'status' => 'published',
                'created_at' => '2025-08-25 06:38:58',
                'updated_at' => '2025-08-29 04:37:50',
            ),
        ));
        
        
    }
}