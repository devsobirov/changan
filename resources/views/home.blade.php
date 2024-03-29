<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>автоPLus</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.7/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .list-cars__item {max-width: 24%; width: 24%;}
        .list-cars__item .img-container {height: 220px; width: 100%; display: flex; align-items: center; justify-content: center;}
        .card-car__left-img img {display: block; height: 320px}
        .configuration__lists {align-self: unset;}
        .configuration__lists-img img {display: block; max-height: 120%}

        @media (max-width: 768px) {
            .list-cars__item {max-width: 48%; width: 48%;}
            .list-cars__item .img-container {height: auto;}
            .card-car__left-img img {height: auto;}
        }
    </style>

</head>

<body x-data="appData()">
<div class="wrapper">
    <!-- header -->
    <header class="header">

        <div class="container">
            <div class="header__inner">

                <img class='header__logo' src="img/logo.png" alt="logo">
                <div class='header__logo-m'>
                    <img src="img/logo-m.png" alt="logo">
                    <p class='header__logo-m-text'>CHANGAN Центр Москва, ул. Одинцова, 54</p>
                </div>

                <div class="header__info">
                    <div class="header__info-address">
                        <div class="header__info-icon">
                            <svg width="17" height="20">
                                <use href="img/sprite.svg#geo"></use>
                            </svg>
                        </div>
                        <p class="header__info-text">
                            Москва, ул. Одинцова, 54
                        </p>
                    </div>

                    <div class="header__info-phone">
                        <div class="header__info-icon">
                            <svg width="17" height="18">
                                <use href="img/sprite.svg#phone"></use>
                            </svg>
                        </div>
                        <a class="header__info-text" href='tel:+73834567890'>
                            +7 (383) 456-78-90
                        </a>
                    </div>

                    <div class="header__info-link btn">
                        <span>Заказать звонок</span>
                    </div>

                </div>

            </div>
        </div>

    </header>
    <div class="subheader">
        <div class="container">
            <div class="subheader__inner">
                <h1 class='subheader__title'>
                    Только 3 дня ликвидируем склад {{$mark->name}} по ценам 2023 года
                </h1>
                <ul class="subheader__list">
                    <li class="subheader__item">
                        — Льготный кредит под 3,5% всем!
                    </li>
                    <li class="subheader__item">
                        — Рассрочка 0%
                    </li>
                    <li class="subheader__item">
                        — Скидки до 1 620 000₽ до 11.02
                    </li>
                    <li class="subheader__item">
                        — Зимняя резина в подарок!
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- list-cars -->
    <div class="list-cars">
        <div class="container">
            <div class="list-cars__inner">
                <ul class="list-cars__list">
                    @foreach($models as $model)
                        @if($model->total_complectations)
                        <li class="list-cars__item"
                            @click="goToSection('#car-card-'+'{{$model->id}}')">
                            <div class="img-container">
                                <img class="list-cars__item-img" src='{{$model->body->image_url()}}' />
                            </div>
                            <div class="list-cars__item-model">{{$model->name}}</div>
                            <div class="list-cars__item-price">
                                <div class='list-cars__item-price-main'>
                                    {{$model->min_price}} <span>₽</span>
                                </div>
                                <div class='list-cars__item-price-old'>
                                    {{$model->min_price_old}} <span>₽</span>
                                </div>
                            </div>
                        </li>
                        @endif
                    @endforeach
                </ul>
                <button x-cloak x-show="false" class='list-cars__btn'>
                    <svg>
                        <use href="img/sprite.svg#spinner"></use>
                    </svg>
                    Больше автомобилей
                </button>
            </div>
        </div>
    </div>

    @foreach($models as $model)
        @if($model->total_complectations)
    <!-- card-car -->
        <div class="card-car" id="car-card-{{$model->id}}">
        <div class="container">
            <div class="card-car__inner">

                <div class="card-car__left">
                    <div class="card-car__left-title">{{$model->name}}</div>
                    <div class="card-car__left-subtitle">{{$model->total_complectations}} а/м в наличии</div>
                    <div class="card-car__left-img">
                        <img src="{{$model->body->image_url()}}" alt="{{$model->name}}">
                    </div>
                    <div class="card-car__left-btns">
                        <button class='card-car__left-btn card-car__btn-blue btn' data-title="Забронировать {{$model->name}}">Забронировать</button>
                        <button class='card-car__left-btn card-car__btn-white btn' @click="setCreditModel(JSON.parse(`{{json_encode($model->baseCardData())}}`)); initCreditRange('{{$model->min_price}}'); goToSection('#credit-section')">Рассчитать кредит</button>
                    </div>
                </div>

                <div class="card-car__right">
                    <div class="card-car__right-price ">от <span class='total-price'>{{$model->min_price}}</span> ₽</div>
                    <div class="card-car__right-price-month">
                        В кредит от <span>{{$model->credit_price}}</span>₽ /мес.
                    </div>
                    <ul class="card-car__right-advantages">
                        <li class="card-car__right-advantages-item">
                            — Выгода при покупке в TRADE-IN
                        </li>
                        <li class="card-car__right-advantages-item">
                            — Выгода при покупке в кредит
                        </li>
                        <li class="card-car__right-advantages-item">
                            — Постановка автомобиля на учет
                        </li>
                        <li class="card-car__right-advantages-item">
                            — Гарантия 5 лет
                        </li>
                        <li class="card-car__right-advantages-item">
                            — Рассрочка от 0%
                        </li>
                        <li class="card-car__right-advantages-item">
                            — Покупка одним днем
                        </li>
                    </ul>
                    <div class="card-car__right-text">
                        Зафиксировать цену и получить промокод на скидку 25%
                    </div>
                    <form class="card-car__right-form form">
                        <input type="hidden" name="Модель" value="{{$mark->name}} {{$model->name}}">
                        <div class="form__item">
                            <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Номер телефона" />
                        </div>
                        <button class="form__item-btn btn">
                            Получить промокод
                        </button>
                    </form>
                    <div class="card-car__right-check">
                        Я согласен на обработку <a href="">персональных данных</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
    @endforeach
    <!-- calc-credit -->
    <div class="calc-credit" id="credit-section">
        <div class="container">

            <div class="calc-credit__inner">


                <div class="calc-credit__top">

                    <div class="calc-credit__top-title">
                        Рассчитайте автокредит
                    </div>

                    <div class="calc-credit__top-selects" x-data="{model_id: null}">

                        <div class="calc-credit__top-input-select input-select">

                            <div class="calc-credit__top-input-select-text input-select__text">
                                <span class='input-select__text-inner' @click="initCreditRange()" id="default-model-input">Выберите модель</span>
                                <svg class='calc-credit__top-input-select__icon input-select__icon'>
                                    <use href="img/sprite.svg#arrow-down"></use>
                                </svg>
                            </div>

                            <ul class='calc-credit__top-select input-select__options'>
                                @foreach($models as $model)
                                    <li class="calc-credit__top-option input-select__option"
                                        @click="model_id = '{{$model->id}}'; initCreditRange('{{$model->min_price}}')"
                                        data-price="{{$model->min_price}}" data-model-id="{{$model->id}}"
                                    >{{$model->name}}</li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="calc-credit__top-input-select input-select">

                            <div class="calc-credit__top-input-select-text input-select__text">
                                <span class='input-select__text-inner'>Выберите комплектацию</span>
                                <svg class='calc-credit__top-input-select__icon input-select__icon'>
                                    <use href="img/sprite.svg#arrow-down"></use>
                                </svg>
                            </div>

                            <ul class='calc-credit__top-select input-select__options'>
                                @foreach($models as $model)
                                    @foreach($model->body->prices as $item)
                                    <li class="calc-credit__top-option input-select__option"
                                        x-cloak="" x-show="!model_id || model_id === '{{$model->id}}'" @click="initCreditRange('{{$item->price}}')"
                                    >{{$model->name}} {{$item->complectation->name}} {{$item->modification->name}}</li>
                                    @endforeach
                                @endforeach
                            </ul>

                        </div>

                    </div>

                </div>

                <div class="calc-credit__main">

                    <div class="calc-credit__calculation">

                        <div class="calc-credit__calculation-main">
                            <div class="calc-credit__calculation-range-block">

                                <p class="calc-credit__calculation-range-title">
                                    Ваш первоначальный взнос
                                </p>
                                <div class="calc-credit__calculation-range-count">
                                    <span class='first-pay'>1 100 000</span>
                                    ₽
                                </div>

                                <div class="calc-credit__calculation-range-slider">
                                    <input class='range-slider range-first-pay' type="range" min='0' max='80' value='20' step='5'>

                                    <div class="calc-credit__calculation-range-data">
                                        <span>0%</span>
                                        <span>20%</span>
                                        <span>40%</span>
                                        <span>60%</span>
                                        <span>80%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="calc-credit__calculation-range-block">

                                <p class="calc-credit__calculation-range-title">
                                    Срок кредитования
                                </p>
                                <div class="calc-credit__calculation-range-count">
                                    <span class='credit-term'>12</span>
                                    <span class='credit-term-text'>мес.</span>
                                </div>
                                <div class="calc-credit__calculation-range-slider">
                                    <input class='range-slider range-credit-term' type="range" min='6' max='96' value='12' step='6'>
                                    <div class="calc-credit__calculation-range-data">
                                        <span>6 мес</span>
                                        <span>48 мес</span>
                                        <span>96 мес</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="calc-credit__calculation-details">
                            <div class="calc-credit__calculation-detail">
                                <p class="calc-credit__calculation-detail-title">
                                    <span class='month-pay'>25 665</span>₽
                                </p>
                                <p class="calc-credit__calculation-detail-subtitle">Ежемесячный платеж</p>
                            </div>

                            <div class="calc-credit__calculation-detail">
                                <p class="calc-credit__calculation-detail-title month-pay">3,5%</p>
                                <p class="calc-credit__calculation-detail-subtitle">Льготная ставка
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="calc-credit__form-check">

                        <p class='calc-credit__form-check-title'>Подать заявку на автокредит онлайн</p>

                        <form class="calc-credit__form form">

                            <div class="form__item">
                                <input class="form__input input__name" type="text" name="Имя" placeholder="Ваше имя" />
                            </div>

                            <div class="form__item">
                                <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Ваш номер" />
                            </div>

                            <button class="form__item-btn btn">
                                Зафиксировать цену в кредит
                            </button>
                        </form>

                        <div class="calc-credit__checks">
                            Я согласен на обработку <a href="">персональных данных</a>.
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- bank_partner -->
    <section class='bank-partner'>
        <div class="container">
            <div class="bank-partner__inner">
                <div class="bank-partner__banks">
                    <div class="bank-partner__bank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="149" height="23" viewBox="0 0 149 23" fill="none">
                            <g clip-path="url(#clip0_314_848)">
                                <path
                                    d="M66.5783 6.56058L69.6837 4.42297H59.2903V17.23H69.6837V15.091H62.2599V11.8211H68.6037V9.68346H62.2599V6.56058H66.5783ZM51.44 9.41208H47.8401V6.56058H53.5999L56.7039 4.42297H44.8721V17.23H51.0583C54.5223 17.23 56.5232 15.7621 56.5232 13.206C56.5232 10.7529 54.7247 9.41208 51.44 9.41208ZM50.9456 15.091H47.8416V11.5484H50.9456C52.8352 11.5484 53.7127 12.1366 53.7127 13.3304C53.7127 14.5255 52.7672 15.091 50.9456 15.091ZM78.0949 4.42297H72.4494V17.23H75.4189V13.6031H78.1181C81.7179 13.6031 83.966 11.8425 83.966 9.0137C83.966 6.18359 81.715 4.42297 78.0949 4.42297ZM78.0284 11.4655H75.3972V6.56058H78.0284C79.9397 6.56058 80.9748 7.44157 80.9748 9.0137C80.9748 10.5845 79.9397 11.4655 78.0284 11.4655ZM39.7889 14.4627C39.0029 14.8617 38.1208 15.0709 37.2242 15.0709C34.5467 15.0709 32.6123 13.2889 32.6123 10.8372C32.6123 8.38404 34.5467 6.60336 37.2242 6.60336C38.1935 6.59012 39.1411 6.86936 39.9233 7.39879L42.0601 5.93226L41.9257 5.8066C40.6881 4.7799 39.0241 4.25586 37.1345 4.25586C35.0874 4.25586 33.2209 4.90557 31.8706 6.07932C31.1977 6.68554 30.6667 7.41327 30.3108 8.21728C29.9549 9.02128 29.7817 9.88438 29.8018 10.7529C29.7885 11.6332 29.9645 12.5071 30.3197 13.3239C30.6748 14.1407 31.202 14.884 31.8706 15.5108C33.2824 16.7506 35.1647 17.4276 37.1114 17.3957C39.2482 17.3957 41.1161 16.7046 42.3753 15.4479L40.464 14.1271L39.7889 14.4627ZM119.664 4.44435V17.2513H122.634V12.0109H128.956V17.2513H131.925V4.44435H128.956V9.70485H122.635V4.44435H119.664ZM114.559 17.2513H117.685L111.882 4.44435H108.867L102.951 17.2513H105.944L107.135 14.6712H113.434L114.559 17.2513ZM108.035 12.535L110.33 7.39879L112.489 12.535H108.036H108.035ZM138.583 12.0737H140.426L144.97 17.2286H148.794L142.722 10.6059L148.029 4.42297H144.633L140.224 9.91473H138.584V4.42297H135.615V17.23H138.583V12.0724V12.0737ZM93.1435 9.43213V6.58197H100.904V4.44302H90.1755V17.25H96.3603C99.8257 17.25 101.827 15.7835 101.827 13.2261C101.827 10.7743 100.027 9.43213 96.7434 9.43213H93.1435ZM93.1435 15.1124V11.5697H96.249C98.1371 11.5697 99.0146 12.158 99.0146 13.3518C99.0146 14.5469 98.0923 15.1338 96.249 15.1338H93.145L93.1435 15.1124ZM20.5115 4.33874C21.0508 4.98845 21.5004 5.70233 21.8835 6.45631L11.4902 13.6031L7.12695 11.0457V7.98566L11.4685 10.5217L20.5115 4.33874Z"
                                    fill="#21A038" />
                                <path
                                    d="M2.69764 10.8364C2.69764 10.6894 2.69764 10.5637 2.72077 10.4167L0.0895449 10.291C0.0895449 10.4581 0.0664132 10.648 0.0664132 10.8151C0.063062 13.6342 1.26811 16.3396 3.41762 18.3388L5.28405 16.6009C4.46147 15.8464 3.80923 14.9483 3.36523 13.9587C2.92122 12.9691 2.6943 11.9078 2.69764 10.8364Z"
                                    fill="url(#paint0_linear_314_848)" />
                                <path
                                    d="M11.4707 2.66271C11.6283 2.66271 11.7627 2.66271 11.9203 2.6841L12.0562 0.23099C11.8755 0.23099 11.6731 0.210938 11.4924 0.210938C9.98995 0.211351 8.50258 0.487607 7.11651 1.02368C5.73045 1.55976 4.4733 2.34498 3.41797 3.33381L5.28441 5.07305C6.09009 4.31032 7.05251 3.70419 8.11512 3.29026C9.17773 2.87634 10.3191 2.66298 11.4721 2.66271H11.4707Z"
                                    fill="url(#paint1_linear_314_848)" />
                                <path
                                    d="M11.4703 19.0092C11.3127 19.0092 11.1782 19.0092 11.0207 18.9878L10.8848 21.4423C11.064 21.4423 11.2664 21.4623 11.4457 21.4623C12.9484 21.4621 14.436 21.1859 15.8223 20.6498C17.2087 20.1138 18.4661 19.3285 19.5216 18.3395L17.6551 16.6016C16.854 17.3694 15.8926 17.9788 14.8292 18.3928C13.7658 18.8069 12.6226 19.0171 11.4688 19.0106L11.4703 19.0092Z"
                                    fill="url(#paint2_linear_314_848)" />
                                <path
                                    d="M16.4194 4.08708L18.6459 2.55773C16.62 1.02824 14.086 0.191152 11.4707 0.1875V2.63928C13.2401 2.65027 14.9647 3.15571 16.4194 4.08708Z"
                                    fill="url(#paint3_linear_314_848)" />
                                <path
                                    d="M22.8975 10.8393C22.8975 10.1896 22.8296 9.55996 22.7168 8.93164L20.2663 10.6294V10.8393C20.268 11.9804 20.0105 13.1092 19.5104 14.1524C19.0103 15.1956 18.2788 16.1301 17.3633 16.8952L19.1415 18.72C20.3263 17.7205 21.2723 16.5033 21.9191 15.1463C22.5659 13.7892 22.8991 12.3223 22.8975 10.8393Z"
                                    fill="#21A038" />
                                <path
                                    d="M11.4712 19.0117C10.2426 19.0118 9.02802 18.771 7.90756 18.305C6.78709 17.839 5.78628 17.1586 4.97119 16.3086L3.01367 17.9636C4.07638 19.0659 5.37945 19.9477 6.83715 20.5509C8.29486 21.1542 9.87417 21.4652 11.4712 21.4635V19.0117Z"
                                    fill="url(#paint4_linear_314_848)" />
                                <path
                                    d="M5.59926 4.78183L3.82246 2.95703C2.63532 3.95507 1.68769 5.17219 1.04074 6.52983C0.393784 7.88748 0.0618808 9.35548 0.0664529 10.8391H2.69768C2.69785 9.69816 2.95608 8.5699 3.45578 7.52674C3.95548 6.48358 4.68561 5.54859 5.59926 4.78183Z"
                                    fill="url(#paint5_linear_314_848)" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_314_848" x1="3.13714" y1="18.0407" x2="0.803436" y2="10.6907"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.144" stop-color="#F2E913" />
                                    <stop offset="0.304" stop-color="#E7E518" />
                                    <stop offset="0.582" stop-color="#CADB26" />
                                    <stop offset="0.891" stop-color="#A3CD39" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_314_848" x1="4.1683" y1="3.05708" x2="10.8453" y2="0.284453"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.059" stop-color="#0FA8E0" />
                                    <stop offset="0.538" stop-color="#0099F9" />
                                    <stop offset="0.923" stop-color="#0291EB" />
                                </linearGradient>
                                <linearGradient id="paint2_linear_314_848" x1="10.7315" y1="19.3755" x2="18.7963" y2="17.3893"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.123" stop-color="#A3CD39" />
                                    <stop offset="0.285" stop-color="#86C339" />
                                    <stop offset="0.869" stop-color="#21A038" />
                                </linearGradient>
                                <linearGradient id="paint3_linear_314_848" x1="10.93" y1="1.75027" x2="17.592" y2="3.99161"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.057" stop-color="#0291EB" />
                                    <stop offset="0.79" stop-color="#0C8ACB" />
                                </linearGradient>
                                <linearGradient id="paint4_linear_314_848" x1="3.68304" y1="18.3526" x2="10.7967" y2="21.2483"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.132" stop-color="#F2E913" />
                                    <stop offset="0.298" stop-color="#EBE716" />
                                    <stop offset="0.531" stop-color="#D9E01F" />
                                    <stop offset="0.802" stop-color="#BBD62D" />
                                    <stop offset="0.983" stop-color="#A3CD39" />
                                </linearGradient>
                                <linearGradient id="paint5_linear_314_848" x1="2.08325" y1="11.1345" x2="4.61328" y2="3.96128"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.07" stop-color="#A3CD39" />
                                    <stop offset="0.26" stop-color="#81C55F" />
                                    <stop offset="0.922" stop-color="#0FA8E0" />
                                </linearGradient>
                                <clipPath id="clip0_314_848">
                                    <rect width="148.91" height="22.7264" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="153" height="39">
                            <use href="img/sprite.svg#logo_bank--tinkoff"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="129" height="35">
                            <use href="img/sprite.svg#logo_bank--alfa"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="90" height="33">
                            <use href="img/sprite.svg#logo_bank--vtb"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="163" height="39">
                            <use href="img/sprite.svg#logo_bank--rossel"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="149" height="32">
                            <use href="img/sprite.svg#logo_bank--gazProm2"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="141" height="38">
                            <use href="img/sprite.svg#logo_bank--raifaiz"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="147" height="28">
                            <use href="img/sprite.svg#logo_bank--opening"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="154" height="34">
                            <use href="img/sprite.svg#logo_bank--sovcom"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="151" height="35">
                            <use href="img/sprite.svg#logo_bank--gazProm"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="80" height="40">
                            <use href="img/sprite.svg#logo_bank--pochta"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="143" height="28">
                            <use href="img/sprite.svg#logo_bank--uralsib"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="94" height="35">
                            <use href="img/sprite.svg#logo_bank--atb"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="165" height="46">
                            <use href="img/sprite.svg#logo_bank--avangard"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="154" height="23">
                            <use href="img/sprite.svg#logo_bank--primSocBank"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="146" height="35">
                            <use href="img/sprite.svg#logo_bank--otp"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="150" height="34">
                            <use href="img/sprite.svg#logo_bank--ingostrah"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="112" height="35">
                            <use href="img/sprite.svg#logo_bank--zenit"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="150" height="32">
                            <use href="img/sprite.svg#logo_bank--centrInvest"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="151" height="36">
                            <use href="img/sprite.svg#logo_bank--loko"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg width="154" height="36" viewBox="0 0 154 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M36.91 6.123h6.781c3.434 0 5.751 2.73 5.751 5.377 0 2.73-2.317 5.46-5.75 5.46h-4.207v4.384H36.91V6.123Zm6.524 8.52c2.232 0 3.433-1.654 3.433-3.143 0-1.572-1.201-3.143-3.433-3.143h-3.949v6.287h3.949Zm6.78 1.159c0-3.226 2.318-5.79 5.924-5.79 3.69 0 5.493 2.977 5.493 5.955v.58H52.79c.343 1.902 2.06 2.977 4.378 2.977 1.459 0 2.66-.413 3.69-.992V20.6c-.944.662-2.489 1.075-4.205 1.075-3.606 0-6.438-2.316-6.438-5.873Zm8.842-1.158c0-1.158-.944-2.648-3.004-2.648-1.974 0-3.09 1.324-3.176 2.648h6.18Zm4.807-4.385h2.575v4.302h5.837v-4.302h2.575v11.085h-2.575v-4.632h-5.837v4.632h-2.575V10.26Zm13.133 5.543c0-3.226 2.317-5.79 5.922-5.79 3.691 0 5.494 2.977 5.494 5.955v.58h-8.841c.343 1.902 2.06 2.977 4.378 2.977 1.459 0 2.66-.413 3.69-.992V20.6c-.944.662-2.489 1.075-4.205 1.075-3.606 0-6.438-2.316-6.438-5.873Zm8.841-1.158c0-1.158-.944-2.648-3.004-2.648-1.974 0-3.09 1.324-3.176 2.648h6.18Zm4.034 1.158c0-3.475 2.833-5.79 6.266-5.79 1.374 0 2.404.247 3.434.744v2.068c-1.03-.497-1.974-.745-3.09-.745-2.232 0-4.12 1.49-4.12 3.723 0 2.233 1.802 3.723 4.12 3.723 1.287 0 2.317-.249 3.262-.828v2.068c-1.116.58-2.232.91-3.691.91-3.348 0-6.18-2.399-6.18-5.873Zm11.159 0c0-3.475 2.833-5.79 6.266-5.79 1.374 0 2.404.247 3.434.744v2.068c-1.03-.497-1.975-.745-3.091-.745-2.231 0-4.12 1.49-4.12 3.723 0 2.233 1.803 3.723 4.12 3.723 1.288 0 2.318-.249 3.262-.828v2.068c-1.116.58-2.231.91-3.691.91-3.261 0-6.18-2.399-6.18-5.873Zm23.948 3.474v1.82c-.343.248-.944.331-1.459.331-1.116 0-2.06-.496-2.403-1.572-.859.91-2.232 1.738-4.206 1.738-2.404 0-4.292-1.324-4.292-3.723 0-2.482 1.888-3.226 4.378-3.226h3.948v-.166c0-1.902-1.631-2.399-3.347-2.399-1.374 0-2.747.497-3.606.993v-2.15c.859-.415 2.146-.91 4.206-.91 3.09 0 5.322 1.405 5.322 4.218v4.136c0 .662.429 1.076.944 1.076 0 0 .258 0 .515-.166Zm-4.206-2.73h-3.004c-1.631 0-2.747.331-2.747 1.407 0 1.24 1.116 1.654 2.49 1.654 1.373 0 2.661-.662 3.261-1.323v-1.738Zm6.009-6.287h2.575v4.302h5.837v-4.302h2.575v11.085h-2.575v-4.632h-5.837v4.632h-2.575V10.26Zm13.133 5.543c0-3.475 2.833-5.79 6.266-5.79 1.373 0 2.404.247 3.434.744v2.068c-1.03-.497-1.975-.745-3.091-.745-2.231 0-4.12 1.49-4.12 3.723 0 2.233 1.803 3.723 4.12 3.723 1.288 0 2.318-.249 3.262-.828v2.068c-1.116.58-2.232.91-3.691.91-3.347 0-6.18-2.399-6.18-5.873ZM36.91 27.3h1.202v2.15l2.06-2.15h1.46l-2.404 2.481 2.832 2.979h-1.459l-2.403-2.482v2.482H36.91V27.3Zm6.695 0h2.49c1.201 0 1.974.661 1.974 1.654 0 .993-.773 1.655-1.974 1.655h-1.288v2.15h-1.202V27.3Zm2.404 2.316c.515 0 .858-.248.858-.662 0-.413-.343-.662-.858-.662h-1.202v1.324h1.202Zm3.777-2.316h4.12v.992H50.9v1.076h2.404v.992H50.9v1.407h3.176v.992h-4.291V27.3Zm5.837 4.467h.515c.515-.745.772-1.737.772-3.557v-.828h3.949v4.468h.772V34h-1.116v-1.075h-3.862V34h-1.116v-2.233h.086Zm4.12 0v-3.475h-1.631c0 1.159-.086 2.317-.601 3.475h2.232Zm3.69-4.467h1.202v3.557l2.747-3.557h1.03v5.46h-1.116v-3.558l-2.918 3.558h-.944V27.3Zm11.331 0v.992h-1.802v4.468H71.76v-4.468h-1.803V27.3h4.807Z"
                                fill="#323E48" />
                            <path
                                d="M7.127 27.3H3.436V11.996c0-5.212 4.463-9.514 9.87-9.514h12.19v9.431c0 5.294-4.464 9.513-9.872 9.513h-6.18l1.373-3.557h4.722c3.433 0 6.18-2.647 6.18-5.956V6.04H13.22c-3.434 0-6.18 2.647-6.18 5.956V27.3h.086Z"
                                fill="url(#a)" />
                            <defs>
                                <radialGradient id="a" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
                                                gradientTransform="matrix(21.3621 0 0 20.5878 4.173 26.301)">
                                    <stop stop-color="#D6005E" />
                                    <stop offset="1" stop-color="#E3448A" />
                                </radialGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="165" height="16">
                            <use href="img/sprite.svg#logo_bank--home"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="145" height="26">
                            <use href="img/sprite.svg#logo_bank--driveClick"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="144" height="16">
                            <use href="img/sprite.svg#logo_bank--ekspo"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="143" height="43">
                            <use href="img/sprite.svg#logo_bank--absolute"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="95" height="37">
                            <use href="img/sprite.svg#logo_bank--psb"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="121" height="39">
                            <use href="img/sprite.svg#logo_bank--mkb"></use>
                        </svg>
                    </div>
                    <div class="bank-partner__bank">
                        <svg class="bank" width="154" height="33">
                            <use href="img/sprite.svg#logo_bank--orange"></use>
                        </svg>
                    </div>
                </div>

                <div class="bank-partner__btn-show list-cars__btn">
                    <p class='bank-partner__btn-show__text'>Ещё 15 банков — партнёров</p>
                    <svg class="arrow-bottom" width="24" height="24">
                        <use href="img/sprite.svg#arrow_bottom"></use>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    <!-- configuration -->
    <div class="configuration">

        <div class="configuration__top">
            <div class="container">
                <div class="configuration__top-inner">

                    <h3 class="configuration__top-title">
                        Подберите комплектацию из моделей в наличии
                    </h3>

                    <div class="configuration__top-input-select input-select">
                        <div class="configuration__top-input-select-text input-select__text">
                            <span class='input-select__text-inner'>Выберите модель</span>
                            <svg class='configuration__top-input-select__icon input-select__icon'>
                                <use href="img/sprite.svg#arrow-down"></use>
                            </svg>
                        </div>

                        <ul class='configuration__top-select input-select__options'>
                            <li class="configuration__top-option input-select__option" x-cloak x-show="modelGroup" @click="modelGroup = ''">Все модели</li>
                            @foreach($models as $item)
                                <li class="configuration__top-option input-select__option" @click="modelGroup = '{{$item->id}}'">{{$item->name}}</li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div>

{{--        <div class="configuration__list-border"></div>--}}
        @foreach($models as $model)
            @php $total = $model->body->prices->count(); @endphp
            @if($total)
            <div class="configuration__list configuration__list-border" x-cloak x-show="!modelGroup || modelGroup === '{{$model->id}}'">
                <div class="container">
                    <div class="configuration__list-inner">

                        <div class="configuration__list-title">
                            {{$mark->name}} {{$model->name}}
                        </div>
                        <div class="configuration__list-count">
                            В наличии: <span>{{$total}}</span> авто
                        </div>

                        <ul class="configuration__lists">
                            @foreach($model->body->prices as $item)
                            <li class="configuration__lists-item">

                                <div class="configuration__lists-top">
                                    <div class="configuration__lists-info">
                                        <div class="configuration__lists-model">
                                            {{strtoupper($model->name)}} {{strtoupper($item->complectation->name)}}
                                        </div>
                                        <div class="configuration__lists-data">
                                            {{$item->modification->name}}
                                        </div>
                                    </div>
                                    <div class="configuration__lists-img">
                                        <img src="{{$model->body->image_url()}}" alt="">
                                    </div>
                                </div>

                                <div class="configuration__lists-bottom">
                                    <div class="configuration__lists-price-month">
                                        <div class="configuration__lists-price">
                                            <span>{{$item->price}}</span> ₽
                                        </div>
                                        <div class="configuration__lists-month">
                                            В кредит <span>{{$item->getCreditPrice()}}</span>₽/мес.
                                        </div>
                                    </div>
                                    <button class="configuration__lists-btn btn" data-title="Забронировать {{$model->name}} {{$item->complectation->name}}">Забронировать</button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        <div class="configuration__list-btn-container container" x-cloak="" x-show="false">
            <button class='configuration__list-btn list-cars__btn'>
                <svg>
                    <use href="img/sprite.svg#spinner"></use>
                </svg>
                Больше автомобилей
            </button>
        </div>

    </div>

    <!-- trade-in-credit -->
    <div class="trade-in-credit">
        <div class="container">
            <div class="trade-in-credit__inner">
                <div class="trade-in">
                    <div class="trade-in-credit__title">
                        <span>TRADE-IN</span>
                        бонус до
                        <span>330 000 рублей!</span>
                    </div>
                    <div class="trade-in-credit__subtitle">
                        Оценим ваш автомобиль по рыночной цене!
                    </div>
                    <div class="trade-in__text">
                        Оставьте заявку, мы подберём для Вас выгодное предложение и зарезервируем интересующую модель
                    </div>
                    <form class="trade-in__form form">
                        <div class="form__item">
                            <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Номер телефона" />
                        </div>
                        <button class="form__item-btn btn">
                            Заказать звонок
                        </button>
                    </form>
                    <div class="trade-in__check">
                        Я согласен на обработку <a href="">персональных данных</a>.
                    </div>
                    <svg class='trade-in__icon' width="258" height="231">
                        <use href="img/sprite.svg#trade-in"></use>
                    </svg>
                </div>

                <div class="credit">
                    <div class="trade-in-credit__title">
                        Рассрочка <span>0%</span> без переплат
                    </div>
                    <div class="trade-in-credit__subtitle">
                        Дополнительная выгода до <span>220 000 рублей!</span>
                    </div>
                    <div class="credit__advans">
                        <div class="credit__item">
                            от 0,1% <br>
                            <span>Процентная ставка</span>
                        </div>
                        <div class="credit__item">
                            12-36 мес. <br>
                            <span>Срок кредита</span>
                        </div>
                        <div class="credit__item">
                            от 10% <br>
                            <span>1-й взнос</span>
                        </div>
                    </div>
                    <button class="credit__btn btn">
                        Узнать подробнее
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- advantage -->
    <div class='advantages'>
        <div class="container">
            <div class="advantages__inner">

                <div class="advantage__block">
                    <div class="advantage__block-icon">
                        <svg width="22" height="19">
                            <use href="img/sprite.svg#adv1"></use>
                        </svg>
                    </div>
                    <div class="advantage__block-text">
                        Зимняя резина и КАСКО в подарок
                    </div>
                </div>

                <div class="advantage__block">
                    <div class="advantage__block-icon">
                        <svg width="28" height="22">
                            <use href="img/sprite.svg#adv2"></use>
                        </svg>
                    </div>
                    <div class="advantage__block-text">
                        Автокредит от 3,5% от 20 банков-партнеров
                    </div>
                </div>

                <div class="advantage__block">
                    <div class="advantage__block-icon">
                        <svg width="22" height="22">
                            <use href="img/sprite.svg#adv3"></use>
                        </svg>
                    </div>
                    <div class="advantage__block-text">
                        Trade In и выгодные гос. программы со скидкой 10%
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- map -->
    <section class='address-map'>
        <div class="container">
            <div class="address-map__inner">

                <div class="address-map__address">

                    <div class="address-map__address-contact">
                        <div class="address-map__address-contact-title">
                            Контакты
                        </div>
                        <div class="address-map__address-data">
                            <p class="address-map__address-data-subtitle">Адрес:</p>
                            <p class="address-map__address-data-text">Москва, ул. Одинцова, 54</p>
                        </div>
                        <div class="address-map__address-data">
                            <p class="address-map__address-data-subtitle">Телефон:</p>
                            <a class="address-map__address-data-text" href="tel:+73834567890">+7 (383) 456-78-90</a>
                        </div>
                    </div>

                    <div class="address-map__address-bottom">
                        <div class="address-map__address-bottom-title">Остались вопросы?</div>

                        <form class="address-map__address-form form">
                            <div class="form__item">
                                <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Номер телефона" />
                            </div>
                            <button class="address-map__address-btn btn">
                                Заказать звонок
                            </button>
                        </form>

                        <div class="address-map__check-item">
                            <div class="address-map__check-input ">
                                <svg width="12" height="8">
                                    <use href="img/sprite.svg#check"></use>
                                </svg>
                            </div>
                            <p class="address-map__check-text">
                                Я согласен на обработку персональных данных.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="map" id='map' />
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class='footer'>

        <div class="container">
            <div class="footer__inner">

                <p class="footer__text">
                    Юридический адрес:105005, НОВОСИБИРСКАЯ ОБЛ., Г. НОВОСИБИРСК, УЛИЦА СТАНЦИОННАЯ, ЗД. 53, ЭТАЖ 1ИНН:
                    5404234589КПП: 540401001ОГРН: 1225400002057
                    <br>
                    Обращаем Ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при
                    каких условиях не является публичной офертой, определяемой положениями ч. 2 ст. 437 Гражданского кодекса
                    Российской Федерации. Для получения подробной информации о стоимости автомобилей, пожалуйста, обратитесь к
                    менеджерам автосалона.
                    <br>
                    Стоимость подарка не зависит от стоимости купленного, а/м, покупатель может выбрать любой подарок из
                    перечисленных при покупке, а/м.
                    Условия кредитования Основные условия кредитования ПАО «Сбербанк» (Генеральная лицензия Банка №1481 от
                    11.08.2015) на покупку нового автомобиля по продукту «Кредит на приобретение нового автомобиля» валюта кредита –
                    рубли РФ; сумма кредита от 200 000 до 4 500 000 руб. Первоначальный взнос по кредиту до 70%. Сумма ежемесячного
                    платежа от 1 437 руб. до 87 854 руб., без комиссий. Срок кредита от 6 мес. до 8 лет. Обеспечение по кредиту –
                    залог приобретаемого автомобиля. Условия кредита действительны на 15.04.2022 и могут быть изменены Банком.
                    Процентная ставка по кредиту от 3,9% годовых на все марки.
                    <br>
                    Партнер по страхованию: АО «Группа Ренессанс Страхование». Генеральная лицензия СИ № 1284 от 25.01.2019 без
                    ограничения срока действия.
                    <br>
                    *Пользователь данного интернет-ресурса обратившийся, через специальные формы связи, размещённые на данном сайте,
                    а также по средствам телефонного звонка, выражает свое безусловное согласие продолжить устную или письменную
                    коммуникацию с помощью электронных средств связи, в т.ч.: sms-информирование, e-mail-рассылка и т.п. и т.д.
                </p>

                <div class="footer__links">
                    <a class="footer__link" href=''>
                        Лицензионное соглашение
                    </a>
                    <a class="footer__link" href=''>
                        Политика конфиденциальности
                    </a>
                </div>

            </div>
        </div>

    </footer>

    <!-- modal -->
    <!-- удачная отправка формы -->
    <div class="modal modal-sendForm">
        <div class="modal__body">

            <div class="modal__inner">
                <div class="modal__close">
                    <svg width="40" height="40">
                        <use href="img/sprite.svg#modal_close"></use>
                    </svg>
                </div>
                <div class="modal-sendForm__title">Ваша заявка успешно <br>отправлена</div>
                <div class="modal-sendForm__subtitle">В скором времени с вами свяжутся наши менеджеры</div>
            </div>

        </div>
    </div>

    <!-- для кнопки заказать звонок -->

    <div class="modal modal-order-phone modal-regular">
        <div class="modal__body">

            <div class="modal__inner">
                <div class="modal__close">
                    <svg width="40" height="40">
                        <use href="img/sprite.svg#modal_close"></use>
                    </svg>
                </div>
                <div class="modal__title">Модальное окно для кнопки "Заказать звонок"</div>
                <div class="modal__subtitle">Скидка 25% до 29 января по секретному промокоду</div>

                <form class="form">
                    <div class="form__item">
                        <input class="form__input input__name" type="text" name="Имя" placeholder="Ваше имя" />
                    </div>
                    <div class="form__item">
                        <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Ваш номер" />
                    </div>
                    <button class="form__item-btn btn">Оставить заявку</button>
                </form>

            </div>

        </div>
    </div>

    <!-- модальное окно - забронировать -->
    <div class="modal modal-reserve modal-regular">
        <div class="modal__body">

            <div class="modal__inner">
                <div class="modal__close">
                    <svg width="40" height="40">
                        <use href="img/sprite.svg#modal_close"></use>
                    </svg>
                </div>
                <div class="modal__title">Модальное окно по кнопке "Забронировать из блока конфигурации"</div>
                <div class="modal__subtitle">Скидка 25% до 29 января по секретному промокоду</div>

                <form class="form">
                    <div class="form__item">
                        <input class="form__input input__name" type="text" name="Имя" placeholder="Ваше имя" />
                    </div>
                    <div class="form__item">
                        <input class="form__input input__tel" type="tel" name="Телефон" placeholder="Ваш номер" />
                    </div>
                    <button class="form__item-btn btn">Оставить заявку</button>
                </form>

            </div>

        </div>
    </div>

</div>
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" id="yandex_api"></script>
<script>
    function yandexiniti() {
        ymaps.ready(init);
        function init() {
            const iconimage_default =
                "data:image/svg+xml,%3Csvg%20width%3D%2236%22%20height%3D%2247%22%20viewBox%3D%220%200%2036%2047%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20clip-path%3D%22url(%23a)%22%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%3E%3Cpath%20d%3D%22M17.709%2046.302c.939%200%2017.71-18.107%2017.71-27.99%200-9.884-7.93-17.896-17.71-17.896S0%208.428%200%2018.312c0%209.883%2016.77%2027.99%2017.709%2027.99m0-19.04c4.959%200%208.979-4.062%208.979-9.073%200-5.01-4.02-9.073-8.979-9.073S8.731%2013.18%208.731%2018.19s4.02%209.074%208.978%209.074%22%20fill%3D%22%231DAEEF%22%2F%3E%3Cpath%20d%3D%22M.234%2017.973c0%209.448%2015.631%2026.757%2016.506%2026.757v-18.2c-4.622%200-8.368-3.884-8.368-8.674s3.746-8.674%208.368-8.674V.866C7.624.866.234%208.525.234%2017.973%22%20fill%3D%22%233EC3FF%22%2F%3E%3C%2Fg%3E%3Cdefs%3E%3CclipPath%20id%3D%22a%22%3E%3Cpath%20fill%3D%22%23fff%22%20d%3D%22M0%20.416h35.418v45.886H0z%22%2F%3E%3C%2FclipPath%3E%3C%2Fdefs%3E%3C%2Fsvg%3E";

            const center = [56.064540, 92.907010];
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

            // myMap.controls.add(zoomControl);
            myMap.behaviors.disable('scrollZoom');

        }
    }

    yandexiniti();
</script>
<script src="{{asset('js/app.js')}}?v=3"></script>
<script>
    function appData () {
        return {
            selectedModel: false,
            modelGroup: '',
            init() {
              initCreditRange();
            },
            setSelectedModel(model) {
                this.selectedModel = model
                goToSection('#car-card');
                //scroll to car-card
            }
        }
    }

    function goToSection(elementSelector) {

        var element = document.querySelector(elementSelector);
        console.log(elementSelector, element);
        setTimeout(function () {
            if (element) {
                // Calculate the coordinates of the element
                var elementRect = element.getBoundingClientRect();
                var absoluteElementTop = elementRect.top + window.pageYOffset;

                // Scroll the page to the element
                window.scrollTo({
                    top: absoluteElementTop,
                    behavior: 'smooth' // Use smooth scrolling for a nicer effect
                });
            } else {
                console.error('Element with selector ' + elementSelector + ' not found.');
            }
        }, 300)


    }

    const carModelsSelect = document.querySelectorAll('ul.calc-credit__top-select.input-select__options li');

    function setCreditModel(model) {
        carModelsSelect.forEach(li => {
            if (li.getAttribute('data-model-id') === `${model.id}`) {
                li.click();
                document.querySelector('#default-model-input').innerHTML = model.name;
            }
        })
    }
    const rangeSliders = document.querySelectorAll('.range-slider');

    let mainColor = '#d5d5d5';
    const rangeColor = '#435dff';

    if (window.innerWidth <= 825) {
        mainColor = 'transparent';
    }

    const defaultCreditTotal = 1667000;
    // NOTE: ежемесячный платёж
    const monthPayCalc = (totalPrice = null) => {
        if (!totalPrice) totalPrice = defaultCreditTotal;

        const monthPay = document.querySelector('.month-pay');
        const firstPayCurrent = Number(document.querySelector('.first-pay').innerHTML.split(' ')[0].replaceAll('&nbsp;', ''));
        const creditTermCurrent = Number(document.querySelector('.range-credit-term').value);
        monthPay.innerHTML = Number(((totalPrice - firstPayCurrent) / creditTermCurrent).toFixed(0)).toLocaleString();
    };

    // NOTE: первоначальный платёж
    const firstPayRange = (totalPrice = null) => {
        const currentRange = rangeSliders[0];
        const tempSliderValue = currentRange.value;
        const progress = (tempSliderValue / currentRange.max) * 100;

        currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

        const firstPay = document.querySelector('.first-pay');

        const firstPayCalc = tempSliderValue => {
            if (!totalPrice) totalPrice = defaultCreditTotal;
            firstPay.innerHTML = (totalPrice * (Number(tempSliderValue) / 100)).toLocaleString();
        };

        firstPayCalc(tempSliderValue);

        currentRange.addEventListener('input', e => {
            const tempSliderValue = e.target.value;
            const progress = (tempSliderValue / currentRange.max) * 100;

            currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

            firstPayCalc(tempSliderValue);
            monthPayCalc(totalPrice);
        });
    };

    // NOTE: число срока кредитования
    const countCreditTerm = value => {
        const creditTerm = document.querySelector('.credit-term');
        creditTerm.innerHTML = value + 6;
    };

    // NOTE: срок кредитования
    const creditTermRange = (totalPrice) => {
        const currentRange = rangeSliders[1];
        const tempSliderValue = currentRange.value - 6;
        const progress = (tempSliderValue / (currentRange.max - 6)) * 100;

        currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

        countCreditTerm(tempSliderValue);

        currentRange.addEventListener('input', e => {
            const tempSliderValue = e.target.value - 6;
            const progress = (tempSliderValue / (currentRange.max - 6)) * 100;
            // console.log(tempSliderValue, progress);

            currentRange.style.background = `linear-gradient(to right, ${rangeColor} ${progress}%, ${mainColor} ${progress}%)`;

            countCreditTerm(tempSliderValue);
            monthPayCalc(totalPrice);
        });
    };

    function initCreditRange (totalPrice = null) {
        if (totalPrice) {
            totalPrice = Number(totalPrice.replaceAll(' ', ''));
        }
        // NOTE: вызов функций
        firstPayRange(totalPrice); // первоначальный платёж
        creditTermRange(totalPrice); // срок кредитования
        monthPayCalc(totalPrice); // ежемесячный платёж
    }
</script>
</body>

</html>
