<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Price extends Model
{
    use HasFactory;

    const CREDIT_RATE = 76.68;

    public $with = ['complectation', 'modification'];

    public $table = 'price';

    public function complectation(): BelongsTo
    {
        return $this->belongsTo(Complectation::class, 'complectation_id', 'id');
    }

    public function modification(): BelongsTo
    {
        return $this->belongsTo(Modification::class, 'modification_id', 'id');
    }

    public function getCreditPrice(): int|string
    {
        return number_format(round($this->price/self::CREDIT_RATE), 0, ',', ' ');
    }
}
