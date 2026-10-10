<?php

namespace Tests\Feature;

use Tests\TestCase;

class AgriLensTest extends TestCase
{
    public function test_halaman_beranda_dapat_diakses(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('AgriLens');
        $response->assertSee('Masa Depan Pertanian Dimulai di Sini');
        $response->assertSee('Latar Belakang');
    }

    public function test_halaman_modul_dan_rincian_modul_dapat_diakses(): void
    {
        $response = $this->get(route('module.index'));
        $response->assertStatus(200);
        $response->assertSee('Modul Edukasi');
        $response->assertSee('Panduan Menanam');

        $detail = $this->get(route('module.detail', ['id' => 1]));
        $detail->assertStatus(200);
        $detail->assertSee('Panduan Menanam Padi');
    }

    public function test_halaman_berita_dan_rincian_berita_dapat_diakses(): void
    {
        $response = $this->get(route('news.index'));
        $response->assertStatus(200);
        $response->assertSee('Berita Terbaru');

        $detail = $this->get(route('news.detail', ['id' => 1]));
        $detail->assertStatus(200);
        $detail->assertSee('Cabai Rawit');
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
}
