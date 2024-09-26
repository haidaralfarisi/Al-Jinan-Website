<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mayit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function pendaftaran(): HasOne
    {
        return $this->hasOne(Pendaftaran::class);
    }
}
