<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'province', 'city', 'kecamatan', 'kelurahan', 'address'])]
class Kopdes extends Model
{
    /** @use HasFactory<\Database\Factories\KopdesFactory> */
    use HasFactory;
}
