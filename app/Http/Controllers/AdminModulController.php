<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Modul;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminModulController extends Controller
{
    /**
     * Menampilkan Dashboard Admin (Read List Data Modul & Metrik).
     */
    public function index(Request $request): View
    {
        $kategoriFilter = $request->query('kategori');

        $query = Modul::with('kategori')->latest('id');
        if ($kategoriFilter) {
            $query->whereHas('kategori', fn ($q) => $q->where('slug', $kategoriFilter));
        }

        $modules = $query->get();
        $categories = Kategori::withCount('moduls')->get();

        $totalModul = Modul::count();
        $totalKategori = Kategori::count();
        $totalBerita = Berita::count();

        return view('admin.dashboard', [
            'modules' => $modules,
            'categories' => $categories,
            'selectedCategory' => $kategoriFilter,
            'totalModul' => $totalModul,
            'totalKategori' => $totalKategori,
            'totalBerita' => $totalBerita,
        ]);
    }

    /**
     * Menampilkan form untuk membuat modul baru (Create Form).
     */
    public function create(): View
    {
        $categories = Kategori::all();

        return view('admin.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Menyimpan data modul baru ke database (Store).
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'title' => 'required|string|max:200',
            'image' => 'nullable|string|max:255',
            'short_desc' => 'required|string|max:300',
            'long_desc' => 'required|string',
            'benefits' => 'nullable|string',
            'planting_steps' => 'nullable|string',
            'care_tips' => 'nullable|string',
            'difficulty' => 'required|in:Pemula,Menengah,Mahir',
            'harvest_days' => 'required|integer|min:1|max:999',
            'published_at' => 'required|date',
        ], [
            'kategori_id.required' => 'Kategori modul wajib dipilih.',
            'title.required' => 'Judul modul wajib diisi.',
            'short_desc.required' => 'Ringkasan singkat wajib diisi.',
            'long_desc.required' => 'Deskripsi lengkap panduan wajib diisi.',
            'harvest_days.required' => 'Estimasi panen wajib diisi.',
            'published_at.required' => 'Tanggal publikasi wajib diisi.',
        ]);

        if (empty($validated['image'])) {
            $validated['image'] = '/assets/menanam/padi.png';
        }

        Modul::create($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Modul pertanian "'.$validated['title'].'" berhasil ditambahkan ke database!');
    }

    /**
     * Menampilkan form untuk mengedit modul (Edit Form).
     */
    public function edit(int $id): View
    {
        $modul = Modul::findOrFail($id);
        $categories = Kategori::all();

        return view('admin.edit', [
            'modul' => $modul,
            'categories' => $categories,
        ]);
    }

    /**
     * Menyimpan perubahan modul ke database (Update).
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $modul = Modul::findOrFail($id);

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'title' => 'required|string|max:200',
            'image' => 'nullable|string|max:255',
            'short_desc' => 'required|string|max:300',
            'long_desc' => 'required|string',
            'benefits' => 'nullable|string',
            'planting_steps' => 'nullable|string',
            'care_tips' => 'nullable|string',
            'difficulty' => 'required|in:Pemula,Menengah,Mahir',
            'harvest_days' => 'required|integer|min:1|max:999',
            'published_at' => 'required|date',
        ]);

        if (empty($validated['image'])) {
            $validated['image'] = $modul->image ?? '/assets/menanam/padi.png';
        }

        $modul->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data modul "'.$modul->title.'" berhasil diperbarui!');
    }

    /**
     * Menghapus data modul dari database (Delete).
     */
    public function destroy(int $id): RedirectResponse
    {
        $modul = Modul::findOrFail($id);
        $title = $modul->title;
        $modul->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Modul "'.$title.'" berhasil dihapus dari sistem!');
    }
}
