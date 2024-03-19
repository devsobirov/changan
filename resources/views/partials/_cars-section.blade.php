@if(!empty($cars) && count($cars))
    <div class="filter">
        @include('partials._car-filters', compact('years', 'kms'))
    </div>
    <div class="choice-car">
        <div class="choice-car__blocks blocks-choice">
            @include('partials._car-items', compact('cars'))
        </div>
    </div>

    <div class="choice-car__btn btn-white">
        Загрузить ещё автомобили
    </div>
@endif
