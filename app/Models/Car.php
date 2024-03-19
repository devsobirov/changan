<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    const BASE_ASSETS_URL = 'https://mai-auto.ru';

    public $table = 'mobils';

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }

    public function getTitle(CarModel $model): string
    {
        return $model->catalog?->title .' '.$model->model . ' '. $this->god_vypuska . ' г.';
    }

    public function getOldPrice(): string
    {
        return number_format(round($this->price * 1.3), 0, '.', ' ');
    }

    public function getPrice(): string
    {
        return number_format($this->price, 0, '.', ' ');
    }
}
