<?php
use Illuminate\Database\Seeder;
use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Support\Str;

class InfoSeeder extends Seeder
{
    public function run()
    {
        $kategori = Kategori::first() ?? Kategori::create(['nama' => 'Umum']);

        for ($i = 1; $i <= 10; $i++) {
            Info::create([
                'kategori_id' => $kategori->id,
                'title' => "Contoh Info $i",
                'slug' => Str::slug("Contoh Info $i"),
                'content' => "Isi dari informasi ke-$i",
                'thumbnail' => null,
                'views' => rand(50, 500),
            ]);
        }
    }
}
