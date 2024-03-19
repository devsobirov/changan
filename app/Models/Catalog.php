<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalog extends Model
{
    use HasFactory;

    public $table = 'catalogs';

    const BASE_ASSETS_URL = 'https://auto-plus-autosalon.ru';

    const CUSTOM_CATALOG_ORDER = [
        'toyota' => 1,
        'subaru' => 2,
        'suzuki' => 3,
        'mitsubishi' => 4,
        'ford' => 5,
        'mazda' => 6,
        'honda' => 7,
        'nissan' => 8,
        'mercedes-benz' => 9,
        'audi' => 10,
        'volkswagen' => 11,
        'bmw' => 12,
        'chevrolet' => 13,
        'lada (ваз)' => 14,
        'hyundai' => 15,
        'kia' => 16
    ];
    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class, 'catalog_id', 'id');
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'catalog_id', 'id');
    }

    public function imageUrl(): string
    {
        return self::BASE_ASSETS_URL . $this->image;
    }

    public function imageAsSvg(): string
    {
        $png = urldecode(strtolower($this->image));
        $svg = str_replace('.png', '.svg', $png);
        return asset($svg);
    }

    public function imageAsWebp(): string
    {
        if (in_array(mb_strtolower($this->title),['ssanyong', 'skoda', 'renault', 'opel', 'volvo'])) {
            return $this->imageAsSvg();
        }
        $png = urldecode(strtolower($this->image));
        $webp = str_replace('.png', '.webp', $png);
        return asset($webp);
    }
}
