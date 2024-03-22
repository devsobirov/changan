<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Model extends BaseModel
{
    use HasFactory;

    public $table = 'model';

    public function body(): HasOne
    {
        return $this->hasOne(ModelBody::class, 'model_id', 'id');
    }

    public function baseCardData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->body->image_url(),
            'price' => $this->min_price,
            'price_old' => $this->min_price_old,
            'price_credit' => $this->credit_price,
            'total' => $this->total_complectations,
        ];
    }
}
