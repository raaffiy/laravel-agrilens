<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modul extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * @var string
     */
    protected $table = 'moduls';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori_id',
        'title',
        'image',
        'short_desc',
        'long_desc',
        'benefits',
        'planting_steps',
        'care_tips',
        'difficulty',
        'harvest_days',
        'published_at',
    ];

    /**
     * Casting tipe data.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'harvest_days' => 'integer',
            'published_at' => 'date',
        ];
    }

    /**
     * Relasi ke Kategori (Many to One).
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Accessor atribut 'category' untuk kompatibilitas tampilan Blade.
     */
    public function getCategoryAttribute(): string
    {
        return $this->kategori?->nama_kategori ?? 'Panduan Menanam';
    }
}
