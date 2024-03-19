@if(!empty($models) && count($models))
    @foreach($models as $model)
        <div class="car-card__block block-choice model-choice" data-choice="{{$model->model}}" data-model="{{$model->id}}">
            <div class="car-card__img">
                <img src="{{$model->imageUrl()}}" alt="{{$model->model}}">
            </div>
            <div class="car-card__title-amount">
                <h4 class='car-card__title'>
                    {{$model->model}}
                </h4>
                <div class="car-card__amount">
                    <span class='amount-car'>{{$model->cars_count}}</span> авто
                </div>
            </div>
            <div class="car-card__price-discount">
                <p class='car-card__price'>
                    от <span class='price-car'>{{$model->getMinPrice()}}</span> ₽
                </p>
                <div class="car-card__discount discount-card">-30%</div>
            </div>
        </div>
    @endforeach
@endif
