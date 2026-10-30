<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

#[Fillable(['kopdes_id', 'product_id', 'total'])]
class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;

    protected function kopdesName(): Attribute
    {
        return Attribute::get(fn () => $this->kopdes?->name);
    }

    public function kopdes(): BelongsTo {
        return $this->belongsTo(Kopdes::class, 'kopdes_id');
    }

    public function scopeLowStock(Builder $query): Builder {
        return $query->whereRaw('1 = 0');
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
