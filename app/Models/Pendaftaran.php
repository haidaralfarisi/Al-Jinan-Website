<?php

namespace App\Models;

use App\Mail\SendEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Mail;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function mayits(): BelongsTo
    {
        return $this->belongsTo(Mayit::class, 'mayit_id');
    }

    public function blok_makams(): BelongsTo
    {
        return $this->belongsTo(blok_Makam::class, 'blok_makam_id'); // Sesuaikan 'blok_makam_id' dengan kolom yang benar
    }

}
