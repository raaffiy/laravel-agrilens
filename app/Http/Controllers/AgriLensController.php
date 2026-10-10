<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AgriLensController extends Controller
{
    /**
     * Data Modul Edukasi Pertanian
     */
    private array $modules = [
        [
            'id' => 1,
            'title' => 'Panduan Menanam Padi',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/padi.png',
            'short_desc' => 'Panduan praktis budidaya padi sawah mulai dari pembibitan hingga panen.',
            'long_desc' => 'Padi (Oryza sativa) merupakan komoditas pangan pokok strategis di Indonesia. Panduan ini membahas teknik pengolahan lahan sawah, pemilihan benih varietas unggul, persemaian, penanaman sistem jajar legowo, manajemen pengairan berselang (intermittent), pemupukan berimbang, pengendalian hama tikus & wereng, hingga proses panen dan pascapanen yang optimal.',
            'benefits' => "• Menghasilkan beras bermutu tinggi\n• Meningkatkan produktivitas gabah per hektar\n• Ketahanan pangan keluarga dan nasional",
            'planting_steps' => "1. Pengolahan tanah & pembajakan sawah (2-3 kali hingga gembur)\n2. Perendaman dan seleksi benih unggul\n3. Persemaian selama 15-21 hari\n4. Pindah tanam (transplanting) dengan jarak tanam teratur\n5. Pengaturan debit air sawah secara berkala\n6. Pemupukan dasar dan susulan sesuai fase pertumbuhan\n7. Panen saat 90-95% butir padi telah menguning",
            'care_tips' => "• Jaga kebersihan pematang sawah dari gulma\n• Lakukan monitoring hama wereng coklat secara teratur\n• Keringkan sawah 7-10 hari sebelum masa panen",
        ],
        [
            'id' => 2,
            'title' => 'Panduan Menanam Jagung',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/jagung.png',
            'short_desc' => 'Teknik budidaya jagung manis dan pipil dengan hasil tongkol maksimal.',
            'long_desc' => 'Jagung adalah komoditas serbaguna untuk pangan dan pakan ternak. Panduan ini mencakup persiapan bedengan gembur, jarak tanam ideal 75x25 cm, penanaman 1-2 biji per lubang, penyiangan gulma, pembumbunan tanah pada pangkal batang, pemupukan urea & NPK, hingga pemanenan pada fase matang fisiologis.',
            'benefits' => "• Sumber karbohidrat kaya serat dan antioksidan\n• Nilai ekonomis tinggi dengan masa panen relatif cepat\n• Batang dan daun sisa dapat dijadikan pakan ternak",
            'planting_steps' => "1. Gemburkan lahan dan buat guludan drainase\n2. Buat lubang tanam sedalam 3-5 cm\n3. Tanam 1-2 benih jagung per lubang lalu tutup tanah tipis\n4. Pengairan cukup pada masa awal pertumbuhan dan pembungaan\n5. Pemupukan susulan pertama pada usia 15-21 HST\n6. Pembumbunan tanah pada umur 30-35 HST\n7. Panen pada umur 65-75 HST (jagung manis) atau 100-110 HST (jagung pipil)",
            'care_tips' => "• Waspadai ulat grayak (Spodoptera frugiperda) pada pucuk daun\n• Hindari genangan air yang berlebih karena akar jagung peka busuk",
        ],
        [
            'id' => 3,
            'title' => 'Panduan Menanam Cabai Rawit & Merah',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/cabai.png',
            'short_desc' => 'Langkah budidaya cabai di pekarangan maupun lahan terbuka dengan buah lebat.',
            'long_desc' => 'Cabai merupakan komoditas bernilai ekonomi tinggi dengan fluktuasi harga yang dinamis. Pembahasan mencakup penyemaian benih dalam polybag, pemasangan mulsa plastik hitam perak, pemangkasan tunas air, ajir penyangga tanaman, hingga pengendalian penyakit antraknosa dan kutu kebul.',
            'benefits' => "• Nilai jual tinggi sepanjang tahun\n• Dapat ditanam di pot/polybag pekarangan sempit\n• Kaya vitamin C dan capsaicin",
            'planting_steps' => "1. Semai benih cabai pada media tanah halus & pupuk kandang\n2. Pindahkan bibit sehat umur 25-30 hari ke bedengan/pot\n3. Pasang ajir bambu di samping batang sejak umur 2 minggu\n4. Siram rutin setiap pagi atau sore hari\n5. Lakukan pewiwitan (pemangkasan tunas air di ketiak daun)\n6. Panen berkala setiap 5-7 hari sekali setelah buah matang merah",
            'care_tips' => "• Gunakan perangkap kuning (yellow sticky trap) untuk kutu kebul\n• Berikan kalsium untuk mencegah busuk pantat buah (blossom end rot)",
        ],
        [
            'id' => 4,
            'title' => 'Panduan Menanam Tomat Sayur & Buah',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/tomat.png',
            'short_desc' => 'Cara menanam tomat agar berbuah lebat, sehat, dan bebas busuk buah.',
            'long_desc' => 'Budidaya tomat membutuhkan perhatian pada ketersediaan sinar matahari dan drainase media tanam. Modul ini menyajikan teknik perbanyakan dari biji, pemindahan bibit, pemangkasan daun bawah yang tua, pemupukan fosfor & kalium tinggi pada masa berbunga, serta sanitasi kebun.',
            'benefits' => "• Sumber likopen tinggi pencegah radikal bebas\n• Masa panen berkelanjutan selama beberapa minggu\n• Sangat cocok untuk kebun urban dan hidroponik",
            'planting_steps' => "1. Siapkan media semai gembur dan steril\n2. Tanam bibit tomat berdaun 4-5 helai ke bedengan gembur\n3. Ikat batang ke ajir secara longgar dengan tali rafia\n4. Pemupukan berimbang NPK pada fase vegetatif dan generatif\n5. Pangkas tunas liar dan daun yang menyentuh tanah\n6. Panen buah saat warna mulai bersemu kemerahan",
            'care_tips' => "• Hindari menyiram langsung ke daun untuk mencegah jamur phytophthora\n• Pastikan tanaman terpapar minimal 6 jam sinar matahari langsung",
        ],
        [
            'id' => 5,
            'title' => 'Panduan Menanam Pohon Pisang',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/banana.png',
            'short_desc' => 'Metode budidaya pisang dari anakan dengan tandan buah besar dan manis.',
            'long_desc' => 'Tanaman pisang mudah dibudidayakan di iklim tropis. Panduan ini membahas seleksi anakan pedang (sword sucker), penggalian lubang tanam 50x50x50 cm dengan campuran pupuk kandang, penjarangan anakan maksimal 2-3 rumpun, pembungkusan tandan (jantung pisang), dan pemotongan pohon pascapanen.',
            'benefits' => "• Seluruh bagian tanaman bermanfaat (buah, daun, jantung, batang)\n• Minim perawatan intensif\n• Panen sepanjang tahun secara bergantian dalam rumpun",
            'planting_steps' => "1. Pilih anakan pedang sehat tinggi 1-1.5 meter\n2. Buat lubang tanam dan beri pupuk kandang matang\n3. Tanam anakan dan padatkan tanah di sekeliling pangkal\n4. Siram rutin di musim kemarau\n5. Potong jantung pisang saat sisir terakhir telah mekar\n6. Bungkus tandan dengan plastik biru/karung transparan\n7. Panen saat sudut buah pisang mulai membulat",
            'care_tips' => "• Pangkas daun kering secara teratur untuk mencegah penyakit layu fusarium\n• Bersihkan gulma di sekeliling lingkaran rumpun",
        ],
        [
            'id' => 6,
            'title' => 'Panduan Menanam Wortel Organik',
            'category' => 'Panduan Menanam',
            'image' => '/assets/menanam/wortel.png',
            'short_desc' => 'Tips menanam wortel di tanah gembur agar umbi lurus, renyah, dan manis.',
            'long_desc' => 'Wortel membutuhkan tanah yang sangat gembur, remah, dan bebas batu/kerikil agar umbi dapat tumbuh lurus tanpa bercabang. Modul ini menjelaskan teknik penaburan benih halus, penjarangan bibit muda, pengendalian gulma manual, dan waktu panen yang pas.',
            'benefits' => "• Kandungan beta-karoten dan vitamin A tinggi\n• Nilai pasar stabil untuk pasar modern maupun tradisional\n• Cocok untuk dataran tinggi hingga menengah",
            'planting_steps' => "1. Olah tanah hingga remah sedalam 30 cm, bersihkan dari kerikil\n2. Buat garitan dangkal dan tabur benih wortel bercampur pasir\n3. Tutup tipis dengan kompos halus dan siram dengan sprayer halus\n4. Lakukan penjarangan saat bibit berumur 3 minggu (jarak 5-7 cm)\n5. Tutup pangkal umbi yang menyembul dengan tanah agar tidak hijau\n6. Panen pada umur 90-100 hari setelah tanam",
            'care_tips' => "• Jangan gunakan pupuk kandang segar yang belum matang karena memicu umbi bercabang\n• Jaga kelembaban tanah konstan selama fase perkecambahan",
        ],
        [
            'id' => 7,
            'title' => 'Pupuk Kompos dari Daun Kering',
            'category' => 'Panduan Membuat Pupuk',
            'image' => 'https://youtu.be/YRHcpHWtf6A?si=4cMn3_I4v7X6EzbJ',
            'short_desc' => 'Memanfaatkan limbah daun kering pekarangan menjadi kompos organik berkualitas.',
            'long_desc' => 'Pupuk kompos dari daun kering merupakan pupuk organik yang dibuat melalui proses dekomposisi bahan-bahan nabati alami oleh mikroorganisme pengurai. Kompos ini sangat efektif memperbaiki struktur tanah, meningkatkan daya simpan air, serta menyediakan unsur hara makro dan mikro bagi tanaman secara berkelanjutan.',
            'benefits' => "• Mengurangi tumpukan sampah dedaunan kering\n• Memperbaiki kapasitas tukar kation (KTK) tanah\n• Gratis dan ramah lingkungan tanpa bahan kimia sintetis",
            'planting_steps' => "1. Cacah daun kering menjadi ukuran 2-5 cm\n2. Campurkan dengan sedikit tanah gembur/kompos jadi sebagai inokulan\n3. Larutkan gula merah dan bioaktivator EM4 dalam air\n4. Siramkan larutan secara merata hingga kelembaban sekitar 50%\n5. Masukkan ke dalam komposter berlubang ventilasi\n6. Bolak-balik tumpukan setiap 5-7 hari sekali\n7. Kompos matang dalam 4-6 minggu dengan ciri dingin dan aroma tanah segar",
            'care_tips' => "• Jika berbau busuk menyengat, tambahkan daun kering dan balik tumpukan (terlalu basah)\n• Simpan kompos matang di tempat teduh dan kering",
        ],
        [
            'id' => 8,
            'title' => 'Pupuk Organik Cair (POC) Limbah Dapur',
            'category' => 'Panduan Membuat Pupuk',
            'image' => 'https://youtu.be/wAhJvDH5b4k?si=jepz2cfmxSPNWXXm',
            'short_desc' => 'Solusi pupuk daun cair siap serap dari sisa sayur, buah, dan air cucian beras.',
            'long_desc' => 'Pupuk Organik Cair (POC) dihasilkan melalui proses fermentasi anaerobik bahan organik segar. POC kaya akan enzim, hormon pertumbuhan alami (auksin & giberelin), serta mikroorganisme menguntungkan yang siap diaplikasikan lewat semprotan daun atau kocor akar.',
            'benefits' => "• Cepat diserap oleh stomata daun tanaman\n• Menghemat biaya pembelian pupuk kimia cair hingga 80%\n• Meningkatkan ketahanan tanaman terhadap serangan penyakit",
            'planting_steps' => "1. Rajang sisa sayuran dan kulit buah sisa dapur\n2. Masukkan ke wadah jerigen bersama air cucian beras\n3. Tambahkan molase/gula merah cair dan bioaktivator EM4\n4. Tutup rapat dan pasang selang aerasi ke botol air (sistem aerator sederhana)\n5. Buka sebentar setiap 2 hari untuk membuang gas fermentasi\n6. Fermentasi selama 14-21 hari hingga tercium aroma tape segar\n7. Saring cairan dan simpan di botol gelap tertutup",
            'care_tips' => "• Selalu encerkan POC sebelum pakai dengan dosis 1:10 atau 1:20 bagian air bersih\n• Semprotkan pada pagi hari sebelum pukul 09.00 saat stomata terbuka",
        ],
        [
            'id' => 9,
            'title' => 'Pupuk Organik Matang Kotoran Kambing',
            'category' => 'Panduan Membuat Pupuk',
            'image' => 'https://youtu.be/70Mzo4LppLI?si=4pxT-MBN-hw3KwgO',
            'short_desc' => 'Fermentasi kotoran kambing kering menjadi pupuk kaya N-P-K yang aman bagi akar.',
            'long_desc' => 'Kotoran kambing memiliki kadar hara kalium dan nitrogen yang tinggi, namun harus difermentasi terlebih dahulu agar suhu panas dekomposisi mereda dan biji gulma mati. Modul ini mengajarkan cara fermentasi kotoran kambing menggunakan dekomposer hingga bertekstur remah mirip tanah.',
            'benefits' => "• Pelepasan unsur hara bertahap (slow-release nutrient)\n• Sangat baik untuk tanaman buah, sayuran, dan tanaman hias\n• Tidak membakar akar tanaman karena sudah matang sempurna",
            'planting_steps' => "1. Kumpulkan kotoran kambing yang telah kering (bisa digiling halus)\n2. Campur dengan sekam bakar atau serbuk gergaji (perbandingan 4:1)\n3. Larutkan dekomposer EM4 dan molase ke dalam air\n4. Siram tumpukan sambil diaduk hingga kelembaban 40%\n5. Tutup rapat dengan terpal kedap udara\n6. Buka dan balik tumpukan setiap 5 hari sekali\n7. Setelah 3-4 minggu suhu dingin dan bau menyengat hilang, pupuk siap digunakan",
            'care_tips' => "• Jangan gunakan kotoran kambing mentah langsung ke tanaman karena dapat merusak akar\n• Simpan dalam karung goni di tempat kering terlindung dari hujan",
        ],
    ];

    /**
     * Data Berita Pertanian Terkini
     */
    private array $newsList = [
        [
            'id' => 1,
            'title' => 'Update Fluktuasi Harga Cabai Rawit & Bawang Merah Menjelang Akhir Musim',
            'category' => 'Harga Pasar',
            'image' => '/assets/menanam/cabai.png',
            'post_date' => '2026-10-08',
            'long_desc' => 'Pasar induk komoditas pertanian mencatat kenaikan harga cabai rawit merah sebesar 15% akibat curah hujan yang mulai meningkat di beberapa sentra produksi Jawa Barat. Petani dihimbau mengatur jadwal panen dan menjaga kualitas pascapanen agar harga di tingkat petani tetap stabil dan menguntungkan.',
        ],
        [
            'id' => 2,
            'title' => 'Antisipasi Fenomena Cuaca Ekstrem: Panduan Manajemen Drainase Lahan Pangan',
            'category' => 'Cuaca & Iklim',
            'image' => '/assets/menanam/padi.png',
            'post_date' => '2026-10-06',
            'long_desc' => 'Badan Meteorologi memprediksi intensitas hujan sedang hingga lebat di kawasan lumbung padi. Para petani disarankan memperdalam saluran pembuangan air (drainase) di sekeliling bedengan untuk mencegah akar tanaman tergenang dan membusuk.',
        ],
        [
            'id' => 3,
            'title' => 'Teknologi Drone Pemupukan Presisi Mulai Diterapkan di Sentra Jagung',
            'category' => 'Teknologi',
            'image' => '/assets/menanam/jagung.png',
            'post_date' => '2026-10-03',
            'long_desc' => 'Penggunaan pesawat nirawak (drone sprayer) untuk penyemprotan pupuk hayati cair dan pemetaan vegetasi membuktikan efisiensi kerja hingga 4 kali lebih cepat dibanding metode manual, sekaligus mengurangi paparan bahan ke tenaga kerja tani.',
        ],
        [
            'id' => 4,
            'title' => 'Waspada Serangan Ulat Grayak pada Tanaman Hortikultura dan Cara Alami Pengendaliannya',
            'category' => 'Hama dan Penyakit',
            'image' => '/assets/menanam/tomat.png',
            'post_date' => '2026-09-28',
            'long_desc' => 'Serangan ulat grayak frugiperda dapat dicegah sedini mungkin dengan pemanfaatan pestisida nabati berbahan ekstrak daun nimba, tembakau, dan gadung, serta pemasangan perangkap feromon di sudut lahan.',
        ],
    ];

    /**
     * Data Forum Diskusi Komunitas
     */
    private array $discussions = [
        [
            'id' => 1,
            'author' => 'Pak Joko Widodo (Kelompok Tani Sejahtera)',
            'content' => 'Bagaimana cara mengatasi daun cabai yang keriting dan menguning di awal musim tanam ini? Apakah cukup dengan semprotan tembakau?',
            'answer' => 'Gejala tersebut biasanya disebabkan oleh kutu kebul (whitefly) atau thrips. Sebaiknya gunakan perangkap lekat kuning di sekitar bedengan dan semprotkan pestisida nabati bawang putih + sabun colek tipis setiap sore hari.',
            'likes' => 18,
            'created_at' => '3 jam yang lalu',
        ],
        [
            'id' => 2,
            'author' => 'Rina Sasmita (Petani Urban Bandung)',
            'content' => 'Apakah pupuk organik cair dari air kelapa dan cucian beras aman untuk tanaman hidroponik sayur selada?',
            'answer' => 'Aman asalkan POC sudah difermentasi matang sempurna (minimal 14 hari) dan disaring sangat halus agar tidak menyumbat netpot atau pipa nutrisi.',
            'likes' => 12,
            'created_at' => '1 hari yang lalu',
        ],
        [
            'id' => 3,
            'author' => 'Ahmad Faisal (Petani Muda)',
            'content' => 'Berapa takaran kompos daun kering yang ideal untuk campuran media tanam pot ukuran diameter 30 cm?',
            'answer' => 'Perbandingan ideal adalah 2 bagian tanah gembur : 1 bagian kompos daun kering : 1 bagian sekam bakar. Media tanam akan poros dan subur.',
            'likes' => 9,
            'created_at' => '2 hari yang lalu',
        ],
    ];

    /**
     * Halaman Beranda (Home)
     */
    public function home(): View
    {
        return view('pages.home', [
            'featuredModules' => array_slice($this->modules, 0, 3),
            'featuredNews' => array_slice($this->newsList, 0, 3),
        ]);
    }

    /**
     * Halaman Modul Edukasi Pertanian
     */
    public function modules(): View
    {
        $tanaman = array_filter($this->modules, fn ($m) => $m['category'] === 'Panduan Menanam');
        $pupuk = array_filter($this->modules, fn ($m) => $m['category'] === 'Panduan Membuat Pupuk');

        return view('pages.module', [
            'modules' => $this->modules,
            'tanaman' => $tanaman,
            'pupuk' => $pupuk,
        ]);
    }

    /**
     * Halaman Rincian Modul
     */
    public function moduleDetail(int $id): View
    {
        $module = collect($this->modules)->firstWhere('id', $id) ?? $this->modules[0];
        $relatedModules = collect($this->modules)->where('id', '!==', $module['id'])->take(3);

        return view('pages.module-detail', [
            'module' => $module,
            'relatedModules' => $relatedModules,
        ]);
    }

    /**
     * Halaman Berita Pertanian
     */
    public function news(): View
    {
        return view('pages.news', [
            'newsList' => $this->newsList,
        ]);
    }

    /**
     * Halaman Rincian Berita
     */
    public function newsDetail(int $id): View
    {
        $news = collect($this->newsList)->firstWhere('id', $id) ?? $this->newsList[0];
        $recentNews = collect($this->newsList)->where('id', '!==', $news['id'])->take(3);

        return view('pages.news-detail', [
            'news' => $news,
            'recentNews' => $recentNews,
        ]);
    }

    /**
     * Halaman Kuis Interaktif
     */
    public function quiz(): View
    {
        $questions = [
            [
                'question' => 'Unsur hara makro primer manakah yang paling berperan merangsang pertumbuhan daun dan batang hijau pada tanaman?',
                'options' => ['A. Nitrogen (N)', 'B. Kalium (K)', 'C. Kalsium (Ca)', 'D. Tembaga (Cu)'],
                'correct' => 0,
            ],
            [
                'question' => 'Mikroorganisme apakah yang terkandung dalam bioaktivator EM4 untuk mempercepat dekomposisi kompos?',
                'options' => ['A. Bakteri fotosintetik & Asam Laktat', 'B. Jamur Patogen', 'C. Virus Mozaik', 'D. Amuba bebas'],
                'correct' => 0,
            ],
            [
                'question' => 'Waktu terbaik untuk melakukan penyemprotan pupuk organik cair (POC) ke daun adalah pada saat?',
                'options' => ['A. Tengah hari terik', 'B. Pagi hari sebelum pkl 09.00 saat stomata terbuka', 'C. Tengah malam', 'D. Saat hujan deras'],
                'correct' => 1,
            ],
            [
                'question' => 'Sistem tanam padi yang memperbanyak tanaman pinggir untuk meningkatkan sirkulasi udara dan populasi disebut?',
                'options' => ['A. Tumpang Sari', 'B. Jajar Legowo', 'C. Monokultur acak', 'D. Hidroponik rakit apung'],
                'correct' => 1,
            ],
        ];

        return view('pages.quiz', [
            'questions' => $questions,
        ]);
    }

    /**
     * Halaman Forum Diskusi Petani
     */
    public function forum(): View
    {
        return view('pages.forum', [
            'discussions' => $this->discussions,
        ]);
    }

    /**
     * Halaman Lens AI Deteksi Penyakit Tanaman
     */
    public function lensAi(): View
    {
        return view('pages.lens-ai');
    }

    /**
     * Halaman Autentikasi / Login
     */
    public function login(): View
    {
        return view('pages.auth');
    }
}
