@foreach($cars as $car)
    @php $title = $car->getTitle($carModel) @endphp
    <div class="choice-car__block block-choice car-item" data-choice="{{$title}}" data-price="{{$car->getPrice()}}" data-id="{{$car->id}}">
        <div class="choice-car__img">

            <div class="choice-car__img-watermark">
                <svg class="watermark-icon" width="24" height="23" viewBox="0 0 24 23" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.23 10.234c6.244.813 10.993 5.457 11.826 11.563L8.23 23c-.356-4.437-3.693-7.7-8.23-8.047l1.23-4.719Z"
                        fill="#965EEB" />
                    <path d="m10.354 0 4.841 1.213C14.29 8.865 8.015 14.628 0 14.96v-4.83C5.713 9.778 9.986 5.583 10.354 0Z"
                          fill="#04E061" />
                    <path
                        d="M22.29 12.767C15.642 11.899 10.69 6.692 10.355 0h4.94c.354 4.437 3.69 7.7 8.228 8.047l-1.231 4.72Z"
                        fill="#FF4053" />
                    <path
                        d="M13.168 23H8.232c.355-8.245 6.86-14.606 15.29-14.951v4.827c-5.702.347-9.985 4.542-10.353 10.124Z"
                        fill="#0AF" />
                </svg>
                <p class='watermark-text'>Проверено в Автотеке</p>
            </div>
            <div class="choice-car__swiper">

                <div class="choice-car__wrapper">

                    @for ($i = 0; $i <= 30; $i++)
                        @php
                            $property = 'image_' . $i;
                            $img = $car->$property;
                        @endphp
                        @if ($img)
                            <div class="choice-car__slide f-carousel__slide">
                                <div class="choice-car__slide-img">
                                    <img src="{{ asset(\App\Models\Car::BASE_ASSETS_URL . '/' .$img) }}" data-lazy-src="{{ asset(\App\Models\Car::BASE_ASSETS_URL . '/'.$img) }}" alt="car">
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>

            </div>
        </div>

        <div class="choice-car__info">
            <div class="choice-car__title">
                {{$title}}
            </div>
            <div class="choice-car__price">
                <span class="choice-car__price-total">{{$car->getPrice()}} ₽</span>
                <span class='choice-car__discount discount-card'>-30%</span>
                <span class="choice-car__price-old">{{$car->getOldPrice()}} ₽</span>
            </div>
            <div class="choice-car__conditions">
                <span class='condition'>Гарантия 1 год</span>
                <span class='condition'>Льготный кредит</span>
            </div>

            <div class="choice-car__mileage-owner">
                <div class="choice-car__mileage">
                    {{$car->probeg}} км
                </div>
                <div class="choice-car__owner">
                    {{$car->valadelschov}} владельца
                </div>
            </div>

            <div class="choice-car__charact">
                {{$car->dvigatel}}
            </div>
            <button class="choice-car__btn-buy">
                Купить в кредит
            </button>
            <div class="choice-car__bottom">
                <div class="choice-car__tel-text">
                    <a class="choice-car__tel dot" href="tel:+74872528942">+7 (4872) 52-89-42</a>
                    <p class="choice-car__tel-under">Звоните, мы онлайн</p>
                </div>
                <button class="choice-car__btn-order">Забронировать</button>
            </div>
        </div>
    </div>
@endforeach
