<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mark extends Model
{
    use HasFactory;

    public $table = 'mark';

    const MARK_CHANGAN = 16;

    public function models(): HasMany
    {
        return $this->hasMany(\App\Models\Model::class, 'mark_id');
    }
}
