<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Modul;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $katMenanam = Kategori::where('slug', 'panduan-menanam')->first();
        $katPupuk = Kategori::where('slug', 'panduan-membuat-pupuk')->first();

        // 8 Modul Utama Asli AgriLens
        $coreModules = [
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Padi',
                'image' => '/assets/menanam/padi.png',
                'short_desc' => 'Panduan praktis budidaya padi sawah mulai dari pembibitan hingga panen.',
                'long_desc' => 'Padi (Oryza sativa) merupakan komoditas pangan pokok strategis di Indonesia. Panduan ini membahas teknik pengolahan lahan sawah, pemilihan benih varietas unggul, persemaian, penanaman sistem jajar legowo, manajemen pengairan berselang (intermittent), pemupukan berimbang, pengendalian hama tikus & wereng, hingga proses panen dan pascapanen yang optimal.',
                'benefits' => "• Menghasilkan beras bermutu tinggi\n• Meningkatkan produktivitas gabah per hektar\n• Ketahanan pangan keluarga dan nasional",
                'planting_steps' => "1. Pengolahan tanah & pembajakan sawah (2-3 kali hingga gembur)\n2. Perendaman dan seleksi benih unggul\n3. Persemaian selama 15-21 hari\n4. Pindah tanam (transplanting) dengan jarak tanam teratur\n5. Pengaturan debit air sawah secara berkala\n6. Pemupukan dasar dan susulan sesuai fase pertumbuhan\n7. Panen saat 90-95% butir padi telah menguning",
                'care_tips' => "• Jaga kebersihan pematang sawah dari gulma\n• Lakukan monitoring hama wereng coklat secara teratur\n• Keringkan sawah 7-10 hari sebelum masa panen",
                'difficulty' => 'Menengah',
                'harvest_days' => 110,
                'published_at' => '2026-09-15',
            ],
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Jagung',
                'image' => '/assets/menanam/jagung.png',
                'short_desc' => 'Teknik budidaya jagung manis dan pipil dengan hasil tongkol maksimal.',
                'long_desc' => 'Jagung adalah komoditas serbaguna untuk pangan dan pakan ternak. Panduan ini mencakup persiapan bedengan gembur, jarak tanam ideal 75x25 cm, penanaman 1-2 biji per lubang, penyiangan gulma, pembumbunan tanah pada pangkal batang, pemupukan urea & NPK, hingga pemanenan pada fase matang fisiologis.',
                'benefits' => "• Sumber karbohidrat kaya serat dan antioksidan\n• Nilai ekonomis tinggi dengan masa panen relatif cepat\n• Batang dan daun sisa dapat dijadikan pakan ternak",
                'planting_steps' => "1. Gemburkan lahan dan buat guludan drainase\n2. Buat lubang tanam sedalam 3-5 cm\n3. Tanam 1-2 benih jagung per lubang lalu tutup tanah tipis\n4. Pengairan cukup pada masa awal pertumbuhan dan pembungaan\n5. Pemupukan susulan pertama pada usia 15-21 HST\n6. Pembumbunan tanah pada umur 30-35 HST\n7. Panen pada umur 65-75 HST (jagung manis) atau 100-110 HST (jagung pipil)",
                'care_tips' => "• Waspadai ulat grayak (Spodoptera frugiperda) pada pucuk daun\n• Hindari genangan air yang berlebih karena akar jagung peka busuk",
                'difficulty' => 'Pemula',
                'harvest_days' => 75,
                'published_at' => '2026-09-18',
            ],
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Cabai Rawit & Merah',
                'image' => '/assets/menanam/cabai.png',
                'short_desc' => 'Langkah budidaya cabai di pekarangan maupun lahan terbuka dengan buah lebat.',
                'long_desc' => 'Cabai merupakan komoditas bernilai ekonomi tinggi dengan fluktuasi harga yang dinamis. Pembahasan mencakup penyemaian benih dalam polybag, pemasangan mulsa plastik hitam perak, pemangkasan tunas air, ajir penyangga tanaman, hingga pengendalian penyakit antraknosa dan kutu kebul.',
                'benefits' => "• Nilai jual tinggi sepanjang tahun\n• Dapat ditanam di pot/polybag pekarangan sempit\n• Kaya vitamin C dan capsaicin",
                'planting_steps' => "1. Semai benih cabai pada media tanah halus & pupuk kandang\n2. Pindahkan bibit sehat umur 25-30 hari ke bedengan/pot\n3. Pasang ajir bambu di samping batang sejak umur 2 minggu\n4. Siram rutin setiap pagi atau sore hari\n5. Lakukan pewiwitan (pemangkasan tunas air di ketiak daun)\n6. Panen berkala setiap 5-7 hari sekali setelah buah matang merah",
                'care_tips' => "• Gunakan perangkap kuning (yellow sticky trap) untuk kutu kebul\n• Berikan kalsium untuk mencegah busuk pantat buah (blossom end rot)",
                'difficulty' => 'Menengah',
                'harvest_days' => 85,
                'published_at' => '2026-09-22',
            ],
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Tomat Sayur & Buah',
                'image' => '/assets/menanam/tomat.png',
                'short_desc' => 'Cara menanam tomat agar berbuah lebat, sehat, dan bebas busuk buah.',
                'long_desc' => 'Budidaya tomat membutuhkan perhatian pada ketersediaan sinar matahari dan drainase media tanam. Modul ini menyajikan teknik perbanyakan dari biji, pemindahan bibit, pemangkasan daun bawah yang tua, pemupukan fosfor & kalium tinggi pada masa berbunga, serta sanitasi kebun.',
                'benefits' => "• Sumber likopen tinggi pencegah radikal bebas\n• Masa panen berkelanjutan selama beberapa minggu\n• Sangat cocok untuk kebun urban dan hidroponik",
                'planting_steps' => "1. Siapkan media semai gembur dan steril\n2. Tanam bibit tomat berdaun 4-5 helai ke bedengan gembur\n3. Ikat batang ke ajir secara longgar dengan tali rafia\n4. Pemupukan berimbang NPK pada fase vegetatif dan generatif\n5. Pangkas tunas liar dan daun yang menyentuh tanah\n6. Panen buah saat warna mulai bersemu kemerahan",
                'care_tips' => "• Hindari menyiram langsung ke daun untuk mencegah jamur phytophthora\n• Pastikan tanaman terpapar minimal 6 jam sinar matahari langsung",
                'difficulty' => 'Pemula',
                'harvest_days' => 70,
                'published_at' => '2026-09-25',
            ],
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Pohon Pisang',
                'image' => '/assets/menanam/banana.png',
                'short_desc' => 'Metode budidaya pisang dari anakan dengan tandan buah besar dan manis.',
                'long_desc' => 'Tanaman pisang mudah dibudidayakan di iklim tropis. Panduan ini membahas seleksi anakan pedang (sword sucker), penggalian lubang tanam 50x50x50 cm dengan campuran pupuk kandang, penjarangan anakan maksimal 2-3 rumpun, pembungkusan tandan (jantung pisang), dan pemotongan pohon pascapanen.',
                'benefits' => "• Seluruh bagian tanaman bermanfaat (buah, daun, jantung, batang)\n• Minim perawatan intensif\n• Panen sepanjang tahun secara bergantian dalam rumpun",
                'planting_steps' => "1. Pilih anakan pedang sehat tinggi 1-1.5 meter\n2. Buat lubang tanam dan beri pupuk kandang matang\n3. Tanam anakan dan padatkan tanah di sekeliling pangkal\n4. Siram rutin di musim kemarau\n5. Potong jantung pisang saat sisir terakhir telah mekar\n6. Bungkus tandan dengan plastik biru/karung transparan\n7. Panen saat sudut buah pisang mulai membulat",
                'care_tips' => "• Pangkas daun kering secara teratur untuk mencegah penyakit layu fusarium\n• Bersihkan gulma di sekeliling lingkaran rumpun",
                'difficulty' => 'Pemula',
                'harvest_days' => 300,
                'published_at' => '2026-09-29',
            ],
            [
                'kategori_id' => $katMenanam->id,
                'title' => 'Panduan Menanam Wortel Organik',
                'image' => '/assets/menanam/wortel.png',
                'short_desc' => 'Tips menanam wortel di tanah gembur agar umbi lurus, renyah, dan manis.',
                'long_desc' => 'Wortel membutuhkan tanah yang sangat gembur, remah, dan bebas batu/kerikil agar umbi dapat tumbuh lurus tanpa bercabang. Modul ini menjelaskan teknik penaburan benih halus, penjarangan bibit muda, pengendalian gulma manual, dan waktu panen yang pas.',
                'benefits' => "• Kandungan beta-karoten dan vitamin A tinggi\n• Nilai pasar stabil untuk pasar modern maupun tradisional\n• Cocok untuk dataran tinggi hingga menengah",
                'planting_steps' => "1. Olah tanah hingga remah sedalam 30 cm, bersihkan dari kerikil\n2. Buat garitan dangkal dan tabur benih wortel bercampur pasir\n3. Tutup tipis dengan kompos halus dan siram dengan sprayer halus\n4. Lakukan penjarangan saat bibit berumur 3 minggu (jarak 5-7 cm)\n5. Tutup pangkal umbi yang menyembul dengan tanah agar tidak hijau\n6. Panen pada umur 90-100 hari setelah tanam",
                'care_tips' => "• Jangan gunakan pupuk kandang segar yang belum matang karena memicu umbi bercabang\n• Jaga kelembaban tanah konstan selama fase perkecambahan",
                'difficulty' => 'Menengah',
                'harvest_days' => 95,
                'published_at' => '2026-10-02',
            ],
            [
                'kategori_id' => $katPupuk->id,
                'title' => 'Pupuk Kompos dari Daun Kering',
                'image' => 'https://youtu.be/YRHcpHWtf6A?si=4cMn3_I4v7X6EzbJ',
                'short_desc' => 'Memanfaatkan limbah daun kering pekarangan menjadi kompos organik berkualitas.',
                'long_desc' => 'Pupuk kompos dari daun kering merupakan pupuk organik yang dibuat melalui proses dekomposisi bahan-bahan nabati alami oleh mikroorganisme pengurai. Kompos ini sangat efektif memperbaiki struktur tanah, meningkatkan daya simpan air, serta menyediakan unsur hara makro dan mikro.',
                'benefits' => "• Mengurangi tumpukan sampah dedaunan kering\n• Memperbaiki kapasitas tukar kation (KTK) tanah\n• Gratis dan ramah lingkungan tanpa bahan kimia sintetis",
                'planting_steps' => "1. Cacah daun kering menjadi ukuran 2-5 cm\n2. Campurkan dengan sedikit tanah gembur/kompos jadi\n3. Larutkan gula merah dan bioaktivator EM4 dalam air\n4. Siramkan larutan secara merata hingga kelembaban sekitar 50%\n5. Masukkan ke dalam komposter berlubang ventilasi\n6. Bolak-balik tumpukan setiap 5-7 hari sekali\n7. Kompos matang dalam 4-6 minggu",
                'care_tips' => "• Jika berbau busuk menyengat, tambahkan daun kering dan balik tumpukan\n• Simpan kompos matang di tempat teduh dan kering",
                'difficulty' => 'Pemula',
                'harvest_days' => 35,
                'published_at' => '2026-10-05',
            ],
            [
                'kategori_id' => $katPupuk->id,
                'title' => 'Pupuk Organik Cair (POC) Limbah Dapur',
                'image' => 'https://youtu.be/wAhJvDH5b4k?si=jepz2cfmxSPNWXXm',
                'short_desc' => 'Solusi pupuk daun cair siap serap dari sisa sayur, buah, dan air cucian beras.',
                'long_desc' => 'Pupuk Organik Cair (POC) dihasilkan melalui proses fermentasi anaerobik bahan organik segar. POC kaya akan enzim, hormon pertumbuhan alami (auksin & giberelin), serta mikroorganisme menguntungkan yang siap diaplikasikan lewat semprotan daun atau kocor akar.',
                'benefits' => "• Cepat diserap oleh stomata daun tanaman\n• Menghemat biaya pembelian pupuk kimia cair hingga 80%\n• Meningkatkan ketahanan tanaman terhadap serangan penyakit",
                'planting_steps' => "1. Rajang sisa sayuran dan kulit buah sisa dapur\n2. Masukkan ke wadah jerigen bersama air cucian beras\n3. Tambahkan molase/gula merah cair dan bioaktivator EM4\n4. Tutup rapat dan pasang selang aerasi ke botol air\n5. Buka sebentar setiap 2 hari untuk membuang gas\n6. Fermentasi selama 14-21 hari\n7. Saring cairan dan simpan di botol tertutup",
                'care_tips' => "• Selalu encerkan POC sebelum pakai dengan dosis 1:10 bagian air bersih\n• Semprotkan pada pagi hari sebelum pukul 09.00 saat stomata terbuka",
                'difficulty' => 'Pemula',
                'harvest_days' => 21,
                'published_at' => '2026-10-08',
            ],
        ];

        foreach ($coreModules as $mod) {
            Modul::create($mod);
        }

        // Tambahan data dummy otomatis dengan Faker (locale id_ID) untuk melampaui ketentuan minimal 10 data
        $tanamanTambahan = [
            'Bawang Merah Varietas Bima Brebes',
            'Kopi Arabika Dataran Tinggi Priangan',
            'Selada Keriting Hidroponik NFT',
            'Kacang Kedelai Organik Non-GMO',
        ];

        foreach ($tanamanTambahan as $nama) {
            Modul::create([
                'kategori_id' => $katMenanam->id,
                'title' => "Panduan Menanam {$nama}",
                'image' => '/assets/menanam/padi.png',
                'short_desc' => "Teknik praktis menanam {$nama} untuk petani pemula di lahan ".$faker->city(),
                'long_desc' => "Budidaya {$nama} membutuhkan pengawasan rutin terhadap kadar keasaman (pH) tanah dan rotasi pemupukan. Dikelola langsung oleh kelompok binaan {$faker->name()} di daerah {$faker->address()}.",
                'benefits' => '• Permintaan pasar stabil di '.$faker->city()."\n• Umur panen ideal dengan margin keuntungan tinggi",
                'planting_steps' => "1. Olah tanah gembur dan tambahkan pupuk kandang\n2. Tanam benih berkualitas tinggi\n3. Perawatan rutin pengairan setiap pagi",
                'care_tips' => '• Bersihkan rumput liar dan berikan pupuk hayati berkala',
                'difficulty' => $faker->randomElement(['Pemula', 'Menengah', 'Mahir']),
                'harvest_days' => $faker->numberBetween(45, 120),
                'published_at' => $faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
