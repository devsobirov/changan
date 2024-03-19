<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Catalog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $catalog = Catalog::select('id', 'title', 'image')->withCount('cars')->get();
        $sortedCatalog = $this->getCatalogInCustomOrder($catalog);
        $kms = [];
        $years = Car::orderBy('god_vypuska')->distinct('god_vypuska')->pluck('god_vypuska');
        $kms['min'] = Car::min('probeg');
        $kms['max'] = Car::max('probeg');

        return view('home', compact('catalog', 'sortedCatalog','kms', 'years'));
    }

    public function template()
    {
        return view('template');
    }

    public function getModels(Catalog $catalog)
    {
        $models = CarModel::where('models.catalog_id', $catalog->id)
            ->select(
                'models.id', 'models.catalog_id', 'models.model',
                DB::raw('(SELECT MIN(price) FROM mobils WHERE mobils.model_id = models.id ) as min_price'),
                DB::raw('(SELECT image_0 FROM mobils WHERE mobils.price = min_price AND mobils.model_id = models.id LIMIT 1) as image')
            )
            ->withCount('cars')
            ->groupBy('models.id')
            ->get();

        return view('partials._models', compact('models'))->render();
    }

    public function getCars(CarModel $carModel)
    {
        $carModel->load('catalog');
        $cars = Car::where('model_id', $carModel->id)->limit(8)->get();
        return view('partials._car-items', compact('cars', 'carModel'))->render();
    }

    public function filterCars(Request $request)
    {
        $carModel = CarModel::findOrFail($request->model_id);
        $carModel->load('catalog');

        $query = Car::where('model_id', $carModel->id);

        if (is_numeric($request->from_year) && $form = $request->from_year){
            $query = $query->where('god_vypuska', '>=', $form);
        }
        if (is_numeric($request->to_year) && $to = $request->to_year){
            $query = $query->where('god_vypuska', '<=', $to);
        }
        if (is_numeric($request->probeg_from) && $form = $request->from_year){
            $query = $query->where('probeg', '>=', $form);
        }
        if (is_numeric($request->probeg_to) && $to = $request->to_year){
            $query = $query->where('probeg', '<=', $to);
        }

        $cars = $query->offset($request->offset)->limit(8)->get();
        return view('partials._car-items', compact('cars', 'carModel'))->render();
    }

    public function applyForm(Request $request)
    {
        return $request->input();
    }

    private function getCatalogInCustomOrder(Collection $catalog): array
    {
        $sorted = [];
        $customOrder = Catalog::CUSTOM_CATALOG_ORDER;

        foreach ($catalog as $item) {
            $key = mb_strtolower($item->title);
            if (array_key_exists($key, $customOrder)) {
                $sorted[$customOrder[$key]] = $item;
            }
        }

        ksort($sorted, true);
        return array_values($sorted);
    }
}
