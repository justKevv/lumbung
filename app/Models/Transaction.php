<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['kopdes_id', 'name', 'date'])]
class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    public function kopdes(): BelongsTo
    {
        return $this->belongsTo(Kopdes::class, 'kopdes_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(DetailTransaction::class, 'transaction_id');
    }
}
