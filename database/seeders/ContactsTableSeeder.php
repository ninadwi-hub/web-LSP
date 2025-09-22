<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'nina',
                'email' => 'nina@example.com',
                'subject' => 'no',
                'message' => 'cek',
                'phone' => NULL,
                'status' => 'selesai',
                'responded_at' => '2025-08-25 02:14:09',
                'created_at' => '2025-08-19 01:55:51',
                'updated_at' => '2025-08-25 02:14:09',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'nina',
                'email' => 'nina@example.com',
                'subject' => 'no',
                'message' => 'bufgewrf ewow',
                'phone' => NULL,
                'status' => 'pending',
                'responded_at' => NULL,
                'created_at' => '2025-08-25 02:59:15',
                'updated_at' => '2025-08-25 02:59:15',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'nina',
                'email' => 'user@publik.com',
                'subject' => 'no',
                'message' => 'cek',
                'phone' => '098',
                'status' => 'pending',
                'responded_at' => NULL,
                'created_at' => '2025-09-02 02:05:16',
                'updated_at' => '2025-09-02 02:05:16',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'nina',
                'email' => 'user@publik.com',
                'subject' => 'no',
                'message' => 'cek',
                'phone' => '098',
                'status' => 'pending',
                'responded_at' => NULL,
                'created_at' => '2025-09-02 02:05:23',
                'updated_at' => '2025-09-02 02:05:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'nina',
                'email' => 'ninadwi9923@gmail.com',
                'subject' => 'no',
                'message' => 'cek2',
                'phone' => NULL,
                'status' => 'pending',
                'responded_at' => NULL,
                'created_at' => '2025-09-02 02:11:23',
                'updated_at' => '2025-09-02 02:11:23',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'subject' => 'no',
                'message' => 'cek2',
                'phone' => '098',
                'status' => 'baru',
                'responded_at' => NULL,
                'created_at' => '2025-09-02 02:11:45',
                'updated_at' => '2025-09-02 02:11:45',
            ),
        ));
        
        
    }
}