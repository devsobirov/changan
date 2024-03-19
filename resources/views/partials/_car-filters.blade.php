<form method="GET" id="filter-car-items" class="filter__inner">
    <input type="hidden" name="model_id" value="{{$carModel->id}}">
    <div class="years">
        <div class="years__selects">
            <!-- input "год от" -->
            <div class="years__select-item">
                <div class="years__input filter__input">
                    <p class="years__input-text">
                        <span class='input-text-from'>Год от</span>
                        <span class="input-years"></span>
                    </p>
                    <svg class="arrow-input" width="18" height="18" viewBox="0 0 18 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 6.75 9 11.25l-4.5-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <!-- список годов от -->
                <div class="years__select select-from">
                    <div class="years__option clear">Сбросить</div>
                    @foreach($years as $year)
                        <div class="years__option option" data-value="{{$year}}">{{$year}}</div>
                    @endforeach
                </div>
            </div>

            <!-- input "год до" -->
            <div class="years__select-item">
                <div class="years__input filter__input">
                    <p class="years__input-text">
                        <span class='input-text-to'>до</span>
                        <span class="input-years"></span>
                    </p>
                    <svg class="arrow-input" width="18" height="18" viewBox="0 0 18 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 6.75 9 11.25l-4.5-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <!-- список годов до -->
                <div class="years__select select-to">
                    <div class="years__option clear">Сбросить</div>
                    @foreach($years as $year)
                        <div class="years__option option" data-value="{{$year}}">{{$year}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mileage">
        <div class="mileage__inputs">
            <input class='mileage__input filter__input input-from' type="number" placeholder='Пробег от, км' max="{{$kms['min']}}" maxlength="8">
            <input class='mileage__input filter__input input-to' type="number" placeholder='до' max="{{$kms['max']}}" maxlength="8">
        </div>
    </div>
    <button class="filter__btn-reset">Сбросить</button>
</form>
