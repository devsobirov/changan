<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complectation extends Model
{
    use HasFactory;

    public $table = 'complectation';

    // has many modification from price-pivot
}
