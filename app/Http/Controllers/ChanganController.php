<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class ChanganController extends BaseController
{
    protected int $markId = Mark::MARK_CHANGAN;
}
