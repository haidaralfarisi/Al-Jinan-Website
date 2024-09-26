<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blok_makam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tpus(): BelongsTo
    {
        return $this->belongsTo(Tpu::class, 'tpu_id');
    }

    public function pendaftaran(): HasOne
    {
        return $this->hasOne(Pendaftaran::class, 'pendaftaran_id'); // Sesuaikan 'pendaftaran_id' dengan kolom yang benar
    }
}
