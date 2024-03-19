
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SsangYoung3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css" />
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <style>
        .promo__footer-inner + .map__block{height: 0;opacity: 0;visibility: hidden;}
        .promo__footer-inner.active + .map__block{    height: auto;opacity: 1;visibility: visible;}
        .choice-model__block-logo img {max-width: 48px; max-height: 48px;}
        .data-chat-1 .chat__message-client.msg-show {margin-top: 40px;}
        .choice-model__img img {width: 30px; max-height: 30px;}
    </style>
</head>

<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo-text">
                    <div class="header__logo">
                        <img src="img/logo.png" alt="SsangYong logo" />
                    </div>
                    <p class="header__text">Проверенные SsangYong с пробегом Тула, Рязанская 28б</p>
                </div>
                <div class="header__tel">
                    <a class="header__tel-link" href="tel:+74872528942"> +7 (4872) 52-89-42
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        `<section class="subheader">
            <div class="container">
                <div class="subheader__inner show_anim">
                    <h1 class="subheader__title">
                        AUDI с пробегом в наличии по акции до конца недели! Скидки всем!
                    </h1>
                    <p class="subheader__subtitle">
                        Оставьте заявку онлайн и получите 3 первых платежа по кредиту за наш счет. Trade-In день в день с выгодой 200
                        000
                        руб.
                    </p>
                    <div class="timer-promo">
                        <div class="timer-promo__inner">
                            <div class="timer">
                                <div class="timer__value">
                                    <span class="timer__day timer-count">6</span>
                                    <span class="timer__day-text timer-text">дней</span>
                                </div>
                                <div class="timer__value">
                                    <span class="timer__hour timer-count">15</span>
                                    <span class="timer__hour-text timer-text">часов</span>
                                </div>
                                <div class="timer__value">
                                    <span class="timer__min timer-count">55</span>
                                    <span class="timer__min-text timer-text">мин.</span>
                                </div>
                            </div>
                            <p class="timer-promo__text dot">
                                До конца распродажи!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="chat show_anim">

            <div class="chat__blocks">

                <div class="chat__block">
                    <div class="chat__container">
                        <div class="chat__inner">
                            <div class="chat__consultant">
                                <div class="chat__consultant-inner">
                                    <div class="chat__consultant-img">
                                        <img src="./img/consultant.png" alt="consultant" />
                                    </div>
                                    <div class="chat__consultant-info">
                                        <p class="chat__consultant-name">
                                            Глазова Ольга
                                        </p>
                                        <p class="chat__consultant-position">
                                            Онлайн-консультант автосалона “Ауди Москва”
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-messages" data-chat="0">
                                <div class="chat__message-block">
                                    <p class="chat__message chat__message-consultant msg-show">
                                        Здравствуйте!<br>Меня зовут Ирина. Я онлайн-консультант автосалона “Ауди Москва”. Я помогу вам подобрать авто с
                                        пробегом на выгодных условиях
                                    </p>
                                </div>

                                <div class="chat__message-block">
                                    <p class="chat__message chat__message-consultant msg-show">
                                        Какую модель автомобиля вы рассматриваете? Выберите модель из списка, нажав на нее:
                                    </p>
                                </div>

                                <div class="chat__message-block-choice msg-show">
                                    <div class="choice-model">
                                        <div class="choice-model__title">
                                            Выберите марку
                                        </div>

                                        <div class="choice-model__blocks blocks-choice">

                                            <div class="choice-model__input-block">

                                                <div class="choice-model__input">
                                                    <img class='choice-model__input-icon-search' src="img/search.png" alt="">
                                                    <input class="input-search" type="text" placeholder='Поиск по марке'>
                                                    <img class='choice-model__input-icon-del' src="img/del-input.png" alt="">
                                                </div>

                                                <ul class="choice-model__input-search-list">
                                                    @foreach($catalog as $item)
                                                        <li class="choice-model__input-search-item block-choice catalog-choice" data-model="{{$item->title}}" data-choice="{{$item->title}}">
                                                            <div class="choice-model__img">
                                                                <img src="{{$item->imageAsWebp()}}?v=3" alt="{{$item->title}}">
                                                            </div>
                                                            <div class="choice-model__name">{{$item->title}}</div>
                                                            <div class="choice-model__count">{{$item->cars_count}}</div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                            <ul class="choice-model__blocks-logos">
                                                @foreach($sortedCatalog as $item)
                                                    <li class="choice-model__block-logo block-choice catalog-choice" data-model="{{$item->title}}" data-choice="{{$item->title}}">
                                                        <img src="{{$item->imageAsWebp()}}?v=3" alt="{{$item->title}}">
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="choice-model__btn-more">
                                                    <span class="choice-model__btn-more-show">Показать все марки в наличии</span>
                                                <span class="choice-model__btn-more-hide">Скрыть марки</span>
                                                <img src="img/arrow-choice.svg" alt="">
                                            </div>

                                            <ul class="choice-model__blocks-model-list">
                                                @foreach($catalog as $item)
                                                <li class="choice-model__block block-choice catalog-choice" data-model="{{$item->title}}" data-choice="{{$item->title}}">
                                                    <div class="choice-model__img">
                                                        <img src="{{$item->imageAsWebp()}}?v=3" alt="{{$item->title}}">
                                                    </div>
                                                    <div class="choice-model__name">{{$item->title}}</div>
                                                    <div class="choice-model__count">{{$item->cars_count}}</div>
                                                </li>
                                                @endforeach
                                            </ul>

                                        </div>

                                    </div>
                                </div>

                                <p class='chat__message chat__message-client'></p>
                            </div> <!-- 0 -->
                            <div class="chat-messages data-chat-1" data-chat="1">

                                <div class="chat__message-block ">
                                    <div class="chat__message-print">
                                        <span class="message-print">Ольга печатает ...</span>
                                    </div>
                                </div>

                                <div class="chat__message-block-choice">

                                    <div class="car-card__blocks blocks-choice models-choice-list">
                                        <!-- -->
                                    </div>

                                </div>

                                <p class='chat__message chat__message-client'></p>

                            </div> <!-- 1 -->

                            <div class="chat-messages" data-chat="2">

                                <div class="chat__message-block ">
                                    <div class="chat__message-print">
                                        <span class="message-print">Ольга печатает ...</span>
                                    </div>
                                </div>

                                <div class="chat__message-block-choice cars-choice-section">
                                    <div class="filter">
                                        <div class="filter__inner">
                                            <input type="hidden" name="model_id" id="filter-model-id" style="display: none;">
                                            <div class="years">
                                                <div class="years__selects">
                                                    <!-- input "год от" -->
                                                    <div class="years__select-item">

                                                        <div class="years__input filter__input">
                                                            <p class="years__input-text">
                                                                <span class='input-text-from'>Год от</span>
                                                                <span class="input-years" id="input-years-from"></span>
                                                            </p>
                                                            <svg class="arrow-input" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.5 6.75 9 11.25l-4.5-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        <!-- список годов от -->
                                                        <div class="years__select select-from">
                                                            <div class="years__option clear option-from">Сбросить</div>
                                                            @foreach($years as $year)
                                                                <div class="years__option option option-from" data-value="{{$year}}">{{$year}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <!-- input "год до" -->
                                                    <div class="years__select-item">
                                                        <div class="years__input filter__input">
                                                            <p class="years__input-text">
                                                                <span class='input-text-to'>до</span>
                                                                <span class="input-years" id="input-years-to"></span>
                                                            </p>
                                                            <svg class="arrow-input" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.5 6.75 9 11.25l-4.5-4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        <!-- список годов до -->
                                                        <div class="years__select select-to">
                                                            <div class="years__option clear option-to">Сбросить</div>
                                                            @foreach($years as $year)
                                                                <div class="years__option option option-to" data-value="{{$year}}">{{$year}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mileage">
                                                <div class="mileage__inputs">
                                                    <input class='mileage__input filter__input input-from' id="probeg-from" type="number" placeholder='Пробег от, км' maxlength="8">
                                                    <input class='mileage__input filter__input input-to' id="probeg-to" type="number" placeholder='до' maxlength="8">
                                                </div>
                                            </div>
                                            <button class="filter__btn-reset">Сбросить</button>
                                        </div>
                                    </div>
                                    <div class="choice-car">
                                        <div class="choice-car__blocks blocks-choice" id="cars-block-choice">
                                            <div class="choice-car__block block-choice" data-choice=""></div>
                                        </div>
                                    </div>

                                    <div class="choice-car__btn btn-white load-more-btn">
                                        Загрузить ещё автомобили
                                    </div>
                                </div>


                                <p class='chat__message chat__message-client'></p>

                            </div> <!-- 2 -->
                            <div class="chat-messages" data-chat="3">
                                <div class="chat__message-block ">
                                    <div class="chat__message-print">
                                        <span class="message-print">Ольга печатает ...</span>
                                    </div>
                                </div>

                                <div class="chat-last-block">

                                    <div class="chat__message-block">
                                        <p class="chat__message chat__message-consultant msg-show">
                                            Стоимость <span class='total-car' id="total-car"></span> - <span class='total-price' id="total-price"></span>
                                        </p>
                                    </div>

                                    <div class="chat__message-block">
                                        <p class="chat__message chat__message-consultant msg-show">
                                            Данное авто участвует в акции “Выгодный июнь”. Для получения подробной информации о дополнительных скидках и
                                            подарках (Регистратор, Резина или Страховой полис)
                                        </p>
                                    </div>

                                    <div class="chat__message-block">
                                        <p class="chat__message chat__message-consultant msg-show">
                                            Оставьте Ваш номер телефона
                                        </p>
                                    </div>

                                    <div class='chat__form'>
                                        <div class="chat__form-inner">
                                            <div class="chat__form-block">
                                                <form class="form apply-form" id="order-form">
                                                    <input type="hidden" name="car_id" id="ordered-car-id">
                                                    <div class="form__item">
                                                        <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                                                        <span class='input__tel-text'>Ваш номер телефона</span>
                                                    </div>
                                                    <div class="form__item">
                                                        <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                                                    </div>
                                                    <button class="form__item-btn arrow-right">Оставить заявку</button>
                                                </form>

                                            </div>
                                            <div class="chat__form-block">
                                                <div class="discount">
                                                    <p class="discount__price">-10% скидка</p>
                                                    <p class="discount__promocode">По промокоду <span>АВТО77</span></p>
                                                    <p class="discount__text">
                                                        Сообщите промокод консультанту и получите доп. скидку. Акция действительна до конца апреля на любую модель
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='section__promo-footer'>
            <div class="container">
                <div class="promo__footer-inner">
                    <h2 class="promo__footer-title">
                        Актуальные акции автосалона
                    </h2>
                    <div class="promo__footer-blocks">
                        <div class="promo__footer-block promo__header-modal-tiresСasco">
                            <div class="promo__footer-img">
                                <img src="./img/present.png" alt="present">
                            </div>
                            <h3 class="promo__footer-block-title promo-title">
                                Резина и КАСКО<br>в подарок!
                            </h3>
                            <div class="promo__head-btn promo-btn arrow-right">Подробнее</div>
                        </div>
                        <div class="promo__footer-block promo__header-modal-bestPrice">
                            <div class="promo__footer-img">
                                <img src="./img/finger_up.png" alt="finger">
                            </div>
                            <h3 class="promo__footer-block-title promo-title">
                                Мы предложим<br>лучшую цену из всех!
                            </h3>
                            <div class="promo__head-btn promo-btn arrow-right">Подробнее</div>
                        </div>
                        <div class="promo__footer-block promo__header-modal-discount">
                            <div class="promo__footer-img">
                                <img src="./img/ten.png" alt="ten">
                            </div>
                            <h3 class="promo__footer-block-title promo-title">
                                Доп. скидка 10%<br>по гос. программе
                            </h3>
                            <div class="promo__head-btn promo-btn arrow-right">Подробнее</div>
                        </div>
                    </div>
                </div>
                <div class="map__block">
                    <div class="map-title">
                        Авто в наличии в автосалоне
                    </div>
                    <div class="maps" id='map'>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class='footer'>
        <div class="container">
            <div class="footer__inner">
                <ul class="footer__requisites">
                    <li class="footer__requisites-item">
                        ООО "AVTOMIR"
                    </li>
                    <li class="footer__requisites-item">
                        ИНН 4630023879
                    </li>
                    <li class="footer__requisites-item">
                        КПП 710001001
                    </li>
                    <li class="footer__requisites-item">
                        ОГРН 1024600942508
                    </li>
                </ul>
                <a class="footer__agreement" href='#'>
                    Соглашение на обработку персональных данных
                </a>
            </div>
        </div>
    </footer>
    <!-- promo-header -->
    <div class="modal modal-payment">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">3 первых платежа по <br> кредиту за наш счет</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>

    <div class="modal modal-tradIn">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Trade-In день в день <br>с выгодой 200 000 руб.</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>

    <!-- promo-actual -->

    <div class="modal modal-discount">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Доп. скидка 10% по <br>гос. программе</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>

    <div class="modal modal-tiresСasco">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Резина и КАСКО<br>в подарок!</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form apply-form">
                @csrf
                <input type="hidden" name="car_id" class="car-id-input">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>

    <div class="modal modal-bestPrice">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Мы предложим <br>лучшую цену из всех!</div>
            <div class="modal__subtitle">Найдите дешевле, и мы сделаем доп. <br>скидку. У нас вы получите лучшую цену!</div>
            <form class="form apply-form">
                @csrf
                <input type="hidden" name="car_id" class="car-id-input">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>

    <!-- удачная отправка формы -->
    <div class="modal modal-sendForm">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Ваша заявка успешно <br>отправлена</div>
            <div class="modal__subtitle">В скором времени с вами свяжутся наши менеджеры</div>
        </div>
    </div>
    <!-- модальное окно кнопки купить -->
    <div class="modal modal-btnUnderCar">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Оставьте заявку и получите льготный кредит под 3,5% на спец. условиях</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form apply-form">
                @csrf
                <input type="hidden" name="car_id" class="car-id-input">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>
    <!-- модальное окно кнопки забронировать -->
    <div class="modal modal-btnUnderCar-2">
        <div class="modal__inner">
            <div class="modal__close">
                <img src="./img/close.svg" alt="close">
            </div>
            <div class="modal__title">Оставьте заявку и получите льготный кредит под 3,5% на спец. условиях</div>
            <div class="modal__subtitle">Оставьте заявку, и мы подробнее <br>расскажем условия данной акции</div>
            <form class="form apply-form">
                @csrf
                <input type="hidden" name="car_id" class="car-id-input">
                <div class="form__item">
                    <input class="form__input input__tel" type="tel" name="Телефон" placeholder="+7 (___) ___ - __ - __" />
                    <span class='input__tel-text'>Ваш номер телефона</span>
                </div>
                <div class="form__item">
                    <input class="form__input input__name" type="text" name="Имя" placeholder="Как вас зовут?" />
                </div>
                <button class="form__item-btn arrow-right">Оставить заявку</button>
            </form>

        </div>
    </div>
    <div class='consultant_sticky'>
        <div class="consultant_container">
            <div class="consultant_sticky-inner">
                <div class="consultant_sticky-block">
                    <div class="consultant_sticky-img">
                        <img src="./img/consultant.png" alt="consultant" />
                    </div>
                    <div class="consultant_sticky-info">
                        <p class="consultant_sticky-name">
                            Глазова Ольга
                        </p>
                        <p class="consultant_sticky-position deskt">
                            Онлайн-консультант автосалона “АВТОЦЕНТР 77”
                        </p>
                        <p class="consultant_sticky-position mobil">
                            Онлайн-консультант
                        </p>
                    </div>
                </div>
                <div class="consultant_sticky__tel">
                    <a class="consultant_sticky__tel-link" href="tel:+74872528942">
                        <span class='tel-link-desk'>+7 (4872) 52-89-42</span>
                        <span class='tel-link-mob'>
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M23.431 24.875c-2.956 0-5.838-.653-8.644-1.96a25.78 25.78 0 0 1-7.46-5.224 26.439 26.439 0 0 1-5.225-7.478C.785 7.406.126 4.524.125 1.57V.847c0-.252.023-.493.069-.722h8.044l1.271 6.91-3.918 3.953c.962 1.65 2.171 3.196 3.627 4.64a25.67 25.67 0 0 0 4.794 3.747L18 15.387l6.875 1.375v8.044a13.829 13.829 0 0 1-1.444.069Z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" id="yandex_api"></script>
<script>
    function yandexiniti() {
        ymaps.ready(init);
        function init() {
            // document.querySelectorAll('.ymaps-2-1-79-map').forEach(map => map.style.width = '100%');
            const iconimage_default =
                "data:image/svg+xml,%3Csvg width='29' height='38' viewBox='0 0 29 38' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath opacity='0.7' d='M14.5 1.125C10.9362 1.12501 7.51828 2.57367 4.99826 5.15229C2.47824 7.73091 1.06251 11.2283 1.0625 14.875C1.0625 27.25 14.5 36.875 14.5 36.875C14.5 36.875 27.9375 27.25 27.9375 14.875C27.9375 11.2283 26.5218 7.73091 24.0017 5.15229C21.4817 2.57367 18.0638 1.12501 14.5 1.125ZM14.5 20.375C13.4369 20.375 12.3977 20.0524 11.5138 19.4481C10.6299 18.8437 9.94097 17.9848 9.53415 16.9798C9.12733 15.9748 9.02088 14.8689 9.22828 13.802C9.43567 12.7351 9.94759 11.7551 10.6993 10.9859C11.451 10.2167 12.4087 9.6929 13.4514 9.48068C14.494 9.26846 15.5748 9.37738 16.5569 9.79366C17.5391 10.2099 18.3785 10.9149 18.9691 11.8194C19.5598 12.7238 19.875 13.7872 19.875 14.875C19.875 16.3337 19.3087 17.7326 18.3007 18.7641C17.2927 19.7955 15.9255 20.375 14.5 20.375V20.375Z' fill='red'/%3E%3Cpath d='M14.5 20.375C17.4685 20.375 19.875 17.9126 19.875 14.875C19.875 11.8374 17.4685 9.375 14.5 9.375C11.5315 9.375 9.125 11.8374 9.125 14.875C9.125 17.9126 11.5315 20.375 14.5 20.375Z' stroke='%234594F0' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M27.9375 14.875C27.9375 27.25 14.5 36.875 14.5 36.875C14.5 36.875 1.0625 27.25 1.0625 14.875C1.0625 11.2283 2.47823 7.73091 4.99825 5.15228C7.51827 2.57366 10.9362 1.125 14.5 1.125C18.0638 1.125 21.4817 2.57366 24.0017 5.15228C26.5218 7.73091 27.9375 11.2283 27.9375 14.875V14.875Z' stroke='%234594F0' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A";

            const center = [54.99507, 82.83208];
            const zoom_value = 16;// Уровень масштабирования. Допустимые значения: от 0 (весь мир) до 19.

            const myMap = new ymaps.Map("map", {
                center: center,

                zoom: zoom_value,
                suppressMapOpenBlock: true,
                controls: []
            }, {
                suppressMapOpenBlock: true
            });

            const myPlacemark_1 = new ymaps.Placemark(center, {
                // Хинт показывается при наведении мышкой на иконку метки.
                hintContent: 'City,Address',
                // Балун откроется при клике по метке.
                balloonContent: 'City, address<br><a target="_blank" href="https://yandex.ru/maps/?rtext=~52.294413,104.308912">Как добраться</a>',
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: iconimage_default,
                // Размеры метки.
                iconImageSize: [29, 38],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-15, -38]
            });

            const zoomControl = new ymaps.control.ZoomControl({
                options: {
                    size: "small",
                    adjustMapMargin: true,
                    position: {
                        right: 10,
                        bottom: 50,
                    }
                }
            });

            //После того как метка была создана, добавляем её на карту.
            myMap.geoObjects.add(myPlacemark_1);

            myMap.controls.add(zoomControl);
            myMap.behaviors.disable('scrollZoom');

        }
    }

    yandexiniti();
</script>
<script src="{{asset('js/app.js')}}?v=5"></script>
<script>
    const inputSearchList = document.querySelector('.choice-model__input-search-list')
    const inputSearch = document.querySelector('.input-search')

    const modelInputSearch = document.querySelectorAll('.choice-model__input-search-item');

    const resetInput = () => {
        inputSearchList.classList.remove('visible')
        modelInputSearch.forEach(model => {
            model.classList.remove('visible')
        })
    }

    window.addEventListener('click', (e) => {
        if (inputSearchList.classList.contains('visible') && !e.target.closest('.choice-model__input')) {
            resetInput()
        }
    })

    inputSearch.addEventListener('input', (e) => {
        const inputTarget = e.target.value.replace(/\s+/g, '').toLowerCase()

        if (inputTarget !== '') {
            inputSearchList.classList.add('visible')
            modelInputSearch.forEach(model => {
                model.classList.remove('visible')
                const modelSearch = model.dataset.model.replace(/\s+/g, '').toLowerCase()
                if (modelSearch.search(inputTarget) !== -1) {
                    model.classList.add('visible')
                }
            });

        } else {
            resetInput()
        }
    })

    document.querySelector('.choice-model__input-icon-del').addEventListener('click', () => {
        inputSearch.value = ''
        resetInput()
    })

    if (window.innerWidth <= 800) {
        const btnMoreModel = document.querySelector('.choice-model__btn-more')
        const modelBlockList = document.querySelector('.choice-model__blocks-model-list')

        btnMoreModel.addEventListener('click', () => {
            btnMoreModel.classList.toggle('btn-more-visible')

            modelBlockList.classList.toggle('visible')
        })
    }

</script>
</body>

</html>
