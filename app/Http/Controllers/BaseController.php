<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Model;
use App\Models\Price;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    public Mark $mark;

    public function __construct()
    {
        $this->setCarMark();
    }

    public function index()
    {
        $models = Model::where('active', 1)->where('mark_id', $this->mark->id)
            ->select(['id', 'name'])
            ->with('body:body.id,body.model_id,body.type,body.preview')
            ->orderBy('position')
            ->get();

        foreach ($models as $item) {
            $min = $item->body->prices->sortBy('price')->first();
            $item->min_price = number_format($min->price, 0, ',', ' ');
            $item->min_price_old = number_format($min->price_old, 0, ',', ' ');
            $item->total_complectations = $item->body->prices->count();
            $item->credit_price = $min->getCreditPrice();
        }
        return view('home', [
            'models' => $models,
            'mark' => $this->mark
        ]);
    }

    public function applyForm(Request $request)
    {
        return $request->all();
    }

    private function setCarMark()
    {
        $this->mark = Mark::find($this->markId);
    }
}
