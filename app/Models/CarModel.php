<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    public $table = 'models';

    const BASE_ASSETS_URL = 'https://mai-auto.ru';

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id');
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'model_id', 'id');
    }

    public function imageUrl(): string
    {
        return self::BASE_ASSETS_URL .'/'. $this->image;
    }

    public function getMinPrice(): string
    {
        return $this->min_price
            ? number_format($this->min_price, 0, '.', ' ')
            : '';
    }
}
