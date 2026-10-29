<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'province', 'city', 'kecamatan', 'kelurahan', 'address'])]
class Kopdes extends Model
{
    /** @use HasFactory<\Database\Factories\KopdesFactory> */
    use HasFactory;

    public function admins(): HasOne
    {
        return $this->hasOne(Admin::class, 'kopdes_id');
    }
}
