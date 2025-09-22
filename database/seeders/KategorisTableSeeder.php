<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kategoris')->delete();
        
        \DB::table('kategoris')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Artikel',
                'slug' => 'artikel',
                'deskripsi' => 'cek',
                'created_at' => '2025-08-25 02:49:02',
                'updated_at' => '2025-09-08 01:58:02',
            ),
        ));
        
        
    }
}