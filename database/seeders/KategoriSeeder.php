<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Panduan Menanam',
                'slug' => 'panduan-menanam',
                'deskripsi' => 'Panduan praktis budidaya aneka tanaman pangan dan hortikultura.',
            ],
            [
                'nama_kategori' => 'Panduan Membuat Pupuk',
                'slug' => 'panduan-membuat-pupuk',
                'deskripsi' => 'Tutorial pembuatan pupuk organik padat dan cair mandiri dari limbah.',
            ],
            [
                'nama_kategori' => 'Hama dan Penyakit',
                'slug' => 'hama-dan-penyakit',
                'deskripsi' => 'Identifikasi dan pengendalian organisme pengganggu tanaman secara terpadu.',
            ],
            [
                'nama_kategori' => 'Teknologi Pertanian',
                'slug' => 'teknologi-pertanian',
                'deskripsi' => 'Inovasi smart farming, sensor tanah, dan mekanisasi presisi.',
            ],
        ];

        foreach ($categories as $cat) {
            Kategori::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
