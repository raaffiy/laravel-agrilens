<?php

namespace Tests\Feature;

use App\Models\Kategori;
use App\Models\Modul;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgriLensTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_beranda_dapat_diakses(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('AgriLens');
        $response->assertSee('Masa Depan Pertanian Dimulai di Sini');
        $response->assertSee('Latar Belakang');
    }

    public function test_halaman_modul_dan_rincian_modul_dari_database(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get(route('module.index'));
        $response->assertStatus(200);
        $response->assertSee('Modul Edukasi');
        $response->assertSee('Panduan Menanam');

        $firstModul = Modul::first();
        $this->assertNotNull($firstModul);

        $detail = $this->get(route('module.detail', ['id' => $firstModul->id]));
        $detail->assertStatus(200);
        $detail->assertSee($firstModul->title);
    }

    public function test_relasi_kategori_dan_modul(): void
    {
        $this->seed(DatabaseSeeder::class);

        $kategori = Kategori::where('slug', 'panduan-menanam')->first();
        $this->assertNotNull($kategori);
        $this->assertGreaterThan(0, $kategori->moduls()->count());

        $modul = $kategori->moduls()->first();
        $this->assertInstanceOf(Kategori::class, $modul->kategori);
        $this->assertEquals('Panduan Menanam', $modul->category);
    }

    public function test_halaman_berita_dan_rincian_berita_dapat_diakses(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get(route('news.index'));
        $response->assertStatus(200);
        $response->assertSee('Berita Terbaru');

        $detail = $this->get(route('news.detail', ['id' => 1]));
        $detail->assertStatus(200);
    }

    public function test_halaman_kuis_dapat_diakses(): void
    {
        $response = $this->get(route('quiz.index'));
        $response->assertStatus(200);
        $response->assertSee('Kuis & Tantangan');
        $response->assertSee('Unsur hara');
    }

    public function test_halaman_forum_dapat_diakses(): void
    {
        $response = $this->get(route('forum.index'));
        $response->assertStatus(200);
        $response->assertSee('Forum Komunitas');
        $response->assertSee('Kelompok Tani');
    }

    public function test_halaman_lens_ai_dapat_diakses(): void
    {
        $response = $this->get(route('lens.ai'));
        $response->assertStatus(200);
        $response->assertSee('AgriLens AI');
        $response->assertSee('Mulai Analisis Cerdas');
    }

    public function test_halaman_auth_login_dapat_diakses(): void
    {
        $response = $this->get(route('auth.login'));
        $response->assertStatus(200);
        $response->assertSee('Masuk');
        $response->assertSee('Daftar Baru');
    }

    public function test_halaman_dashboard_dapat_diakses_langsung_tanpa_login(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('AgriLens');
        $response->assertSee('Dashboard');
        $response->assertSee('Modul Edukasi');
    }

    public function test_admin_dashboard_menampilkan_daftar_modul(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dashboard Manajemen');
        $response->assertSee('Tambah Modul Baru');
    }

    public function test_admin_dapat_menambah_modul_baru_create(): void
    {
        $this->seed(DatabaseSeeder::class);
        $kategori = Kategori::first();

        $data = [
            'kategori_id' => $kategori->id,
            'title' => 'Panduan Menanam Selada Hidroponik Skala Rumah',
            'image' => '/assets/menanam/padi.png',
            'short_desc' => 'Budidaya selada segar tanpa tanah dengan sistem wick sederhana.',
            'long_desc' => 'Selada dapat dibudidayakan di pekarangan rumah dengan nutrisi AB Mix...',
            'benefits' => '• Segar dan higienis',
            'planting_steps' => '1. Semai di rockwool 2. Pindah ke netpot',
            'care_tips' => '• Pantau ppm nutrisi',
            'difficulty' => 'Pemula',
            'harvest_days' => 35,
            'published_at' => '2026-10-14',
        ];

        $response = $this->post(route('admin.modules.store'), $data);
        $response->assertRedirect(route('admin.dashboard'));

        $this->assertDatabaseHas('moduls', [
            'title' => 'Panduan Menanam Selada Hidroponik Skala Rumah',
        ]);
    }

    public function test_admin_dapat_mengubah_modul_update(): void
    {
        $this->seed(DatabaseSeeder::class);
        $modul = Modul::first();

        $data = [
            'kategori_id' => $modul->kategori_id,
            'title' => 'Judul Modul Diperbarui Oleh Admin',
            'image' => $modul->image,
            'short_desc' => 'Ringkasan baru setelah diedit admin.',
            'long_desc' => 'Deskripsi panjang baru setelah diedit.',
            'difficulty' => 'Mahir',
            'harvest_days' => 90,
            'published_at' => '2026-10-14',
        ];

        $response = $this->put(route('admin.modules.update', ['id' => $modul->id]), $data);
        $response->assertRedirect(route('admin.dashboard'));

        $this->assertDatabaseHas('moduls', [
            'id' => $modul->id,
            'title' => 'Judul Modul Diperbarui Oleh Admin',
            'difficulty' => 'Mahir',
        ]);
    }

    public function test_admin_dapat_menghapus_modul_destroy(): void
    {
        $this->seed(DatabaseSeeder::class);
        $modul = Modul::first();
        $id = $modul->id;

        $response = $this->delete(route('admin.modules.destroy', ['id' => $id]));
        $response->assertRedirect(route('admin.dashboard'));

        $this->assertDatabaseMissing('moduls', [
            'id' => $id,
        ]);
    }
}
