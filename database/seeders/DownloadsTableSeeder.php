<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DownloadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('downloads')->delete();
        
        \DB::table('downloads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'UNPAD',
                'slug' => 'unpad',
                'description' => 'no',
                'file_path' => 'media/MQlxPLV2w56xEsI8e694d7Sg8IEJgAOoaho49cxh.jpg',
                'category_id' => NULL,
                'file_type' => 'jpg',
                'file_size' => 195730,
                'uploader' => 'Nina',
                'status' => 'published',
                'download_count' => 1,
                'created_at' => '2025-08-30 03:13:09',
                'updated_at' => '2025-08-30 03:27:19',
            ),
        ));
        
        
    }
}