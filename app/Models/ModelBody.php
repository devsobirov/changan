<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelBody extends Model
{
    use HasFactory;

    const BASE_ASSET_URL = 'https://nauto-ch.ru/';

    public $table = 'body';
    public $with = ['prices'];
    protected $casts = ['image' => 'array'];

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'body_id', 'id');
    }

    public function image_url(): string
    {
        return  self::BASE_ASSET_URL . $this->preview;
    }
}
