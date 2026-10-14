<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItems = [
            [
                'title' => 'Lonjakan Harga Cabai Merah di Jawa Barat Menjelang Musim Penghujan',
                'category' => 'Harga Pasar',
                'author' => 'Tim Riset AgriLens',
                'image' => '/assets/menanam/cabai.png',
                'post_date' => '2026-10-08',
                'long_desc' => 'Pasar induk komoditas pertanian mencatat kenaikan harga cabai rawit merah sebesar 15% akibat curah hujan yang mulai meningkat di beberapa sentra produksi Jawa Barat. Petani dihimbau mengatur jadwal panen dan menjaga kualitas pascapanen agar harga di tingkat petani tetap stabil dan menguntungkan.',
            ],
            [
                'title' => 'Antisipasi Fenomena Cuaca Ekstrem: Panduan Manajemen Drainase Lahan Pangan',
                'category' => 'Cuaca & Iklim',
                'author' => 'BMKG & Tim Agronomi',
                'image' => '/assets/menanam/padi.png',
                'post_date' => '2026-10-06',
                'long_desc' => 'Badan Meteorologi memprediksi intensitas hujan sedang hingga lebat di kawasan lumbung padi. Para petani disarankan memperdalam saluran pembuangan air (drainase) di sekeliling bedengan untuk mencegah akar tanaman tergenang dan membusuk.',
            ],
            [
                'title' => 'Teknologi Drone Pemupukan Presisi Mulai Diterapkan di Sentra Jagung',
                'category' => 'Teknologi',
                'author' => 'AgriTech Innovation Center',
                'image' => '/assets/menanam/jagung.png',
                'post_date' => '2026-10-03',
                'long_desc' => 'Penggunaan pesawat nirawak (drone sprayer) untuk penyemprotan pupuk hayati cair dan pemetaan vegetasi membuktikan efisiensi kerja hingga 4 kali lebih cepat dibanding metode manual, sekaligus mengurangi paparan bahan ke tenaga kerja tani.',
            ],
            [
                'title' => 'Waspada Serangan Ulat Grayak pada Tanaman Hortikultura dan Cara Alami Pengendaliannya',
                'category' => 'Hama dan Penyakit',
                'author' => 'Laboratorium Perlindungan Tanaman',
                'image' => '/assets/menanam/tomat.png',
                'post_date' => '2026-09-28',
                'long_desc' => 'Serangan ulat grayak frugiperda dapat dicegah sedini mungkin dengan pemanfaatan pestisida nabati berbahan ekstrak daun nimba, tembakau, dan gadung, serta pemasangan perangkap feromon di sudut lahan.',
            ],
        ];

        foreach ($newsItems as $news) {
            Berita::create($news);
        }
    }
}
