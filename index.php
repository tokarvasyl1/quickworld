<?php

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

define('MQ_SERVER_ADDR', 'quickworld.fun');
define('MQ_SERVER_PORT', 25580);
define('MQ_TIMEOUT', 3);

// Display everything in browser, because some people can't look in logs for errors
Error_Reporting(E_ALL | E_STRICT);
Ini_Set('display_errors', true);

require __DIR__ . '/MCstatus/MinecraftPing.php';
require __DIR__ . '/MCstatus/MinecraftPingException.php';

$Timer = MicroTime(true);

$Info = false;
$Query = null;
$count = 0;
$online = true;
try {
    $Query = new MinecraftPing(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);

    $Info = $Query->Query();
    while ($Info === false) {
        if ($Query !== null) {
            $Query->Close();
        }
        $count++;
        if ($count > 10) {
            $online = false;
            break;
        }
        $Query = new MinecraftPing(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
        $Info = $Query->Query();
    }

    // if( $Info === false )
    // {
    // /*
    // * If this server is older than 1.7, we can try querying it again using older protocol
    // * This function returns data in a different format, you will have to manually map
    // * things yourself if you want to match 1.7's output
    // *
    // * If you know for sure that this server is using an older version,
    // * you then can directly call QueryOldPre17 and avoid Query() and then reconnection part
    // */

    // $Query->Close( );
    // $Query->Connect( );

    // $Info = $Query->QueryOldPre17( );
    // }
} catch (MinecraftPingException $e) {
    $Exception = $e;
}

if ($Query !== null) {
    $Query->Close();
}

$Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Український сервер по грі Майнкрафт QuickWorld - Підтримуй рідне, приєднуйся до нас!">
    <title>Український сервер по грі Minecraft - QuickWorld.fun</title>
    <link rel="canonical" href="https://quickworld.fun/"/>
    <link rel="stylesheet" href="static/css/animate.css">
    <link rel="stylesheet" href="static/css/fonts.css@v=%253C%253F=time()%253F%253E.css">
    <link rel="stylesheet" href="static/css/f-all.min.css">
    <link rel="stylesheet" href="static/css/owl.carousel.css">
    <link rel="stylesheet" href="static/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="static/css/style2.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/responsive.css@v=%253C%253F=time()%253F%253E.css">
    <link rel="shortcut icon" type="image/png" href="static/img/favicon.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<section class="overflow-hide">
    <div class="mobile_menu">
        <i class="close_menu fal fa-times"></i>
        <ul>
            <li>
                <a href="index.html">Головна</a>
            </li>
            <li>
                <a class="goto_feedback" href="index.html#services">Донат</a>
            </li>
            <li>
                <a class="open-popup">Опис привілей</a>
            </li>
            <li>
                <div class="online_text online_text_mobile">Онлайн: <?php echo $Info['players']['online']; ?></div>
                <progress max="100" value="<?php echo $Info['players']['online']; ?>"></progress>
            </li>

        </ul>
    </div>
    <div class="header">
        <div class="container">
            <div class="topline">
                <a href="index.php" class="logo">
                    <div class="header_logo">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="440.000000pt" height="443.000000pt" viewBox="0 0 440.000000 443.000000"
                             preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,443.000000) scale(0.100000,-0.100000)"
                               fill="#000000" stroke="none">
                                <path d="M1965 4403 c-284 -33 -533 -106 -767 -224 -426 -214 -783 -583 -985
-1019 -274 -592 -268 -1269 17 -1855 361 -743 1100 -1212 1920 -1218 211 -2
324 10 518 54 l93 21 -37 41 c-20 23 -73 80 -118 127 -45 47 -121 128 -171
180 -49 52 -128 136 -175 185 -47 50 -157 167 -245 260 -88 94 -198 211 -245
260 -385 405 -396 418 -463 550 -92 183 -111 265 -112 480 0 147 3 182 23 255
83 303 263 530 537 675 235 125 544 149 805 64 168 -55 317 -155 470 -315 169
-178 291 -307 580 -614 91 -96 203 -215 250 -265 47 -49 122 -128 166 -175
177 -188 223 -234 227 -230 12 12 60 256 74 370 20 165 13 430 -16 595 -101
573 -400 1053 -873 1403 -273 201 -668 353 -1020 391 -89 10 -383 13 -453 4z"/>
                                <path d="M2765 2159 c-27 -6 -88 -28 -135 -51 -151 -72 -274 -221 -321 -388
-7 -25 -13 -94 -13 -155 1 -87 5 -123 23 -175 44 -126 76 -170 305 -410 45
-47 119 -126 166 -175 46 -50 125 -133 175 -185 49 -52 128 -136 174 -185 280
-298 333 -342 461 -385 91 -31 243 -38 330 -15 152 40 272 123 355 245 136
201 140 466 10 663 -40 59 -51 71 -375 412 -47 50 -157 167 -245 260 -378 402
-400 425 -475 470 -88 53 -171 77 -285 81 -55 2 -122 -1 -150 -7z"/>
                            </g>


                    </div>
                </a>
                <ul class="main_menu">
                    <li>
                        <a href="index.php">Головнаs</a>
                    </li>
                    <li>
                        <a class="goto_feedback" href="index.php#services">Донат</a>
                    </li>
                    <li>
                        <a class="open-popup">Опис привілей</a>
                    </li>
                    <li>
                        <div class="online_text">Онлайн: <?php echo $Info['players']['online']; ?></div>
                        <progress max="100" value="<?php echo $Info['players']['online']; ?>"></progress>
                    </li>
                </ul>
                <div class="social_menu">
                    <a href="https://discord.quickworld.fun/"><i class="fab fa-discord"></i></a>
                    <a href="https://www.youtube.com/channel/UCL2ZctBwx7Aukd0WHpCqmMQ"><i
                                class="fab fa-youtube"></i></a>
                </div>
                <div class="open_menu">
                    <i class="fal fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="main_content sky">

        <div class="container">
            <div class="top_block">
                <div class="header_info">
                    <p class="hi_text1 wow fadeIn" data-wow-delay="0.1s">раді бачити тебе на нашому проєкті</p>
                    <p class="hi_text2 wow fadeIn" data-wow-delay="0.2s"><font>Quick</font>World</p>
                    <p class="hi_text3 wow fadeIn" data-wow-delay="0.3s"><font>Quick</font>world - це один з перших
                        українських серверів Minecraft.<br>
                        Наша команда робить все можливе щоб гра на нашому сервері була<br>
                        наповнена гарними емоціями та максимально комфортною.<br>
                        Наша ціль в 2022 році стати кращим сервером в Україні.</p>
                    <a class="hi_btn wow fadeIn" data-wow-delay="0.5s" href="">Почати гру</a>
                </div>
                <div class="logo_top">
                    <img src="static/img/logo_top.png" alt="">
                </div>
            </div>
            <div class="services" id="services">
                <p class="s_title wow fadeInUp" data-wow-delay="0.1s">Новорічні кейси</p>
                <div class="row s_boxes">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins100">
                            <div class="new_year_donat wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">Кейс 1</p>
                                    <p class="s_price">20 гривень</p>
                                </div>
                                <p class="s_info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto,
                                    quam.
                                </p>
                                <div class="snowman">
                                    <div class="snowman-face"></div>
                                    <div class="snowman-nose"></div>
                                    <div class="mouth"></div>
                                    <div class="buttons"></div>
                                    <div class="arm right"></div>
                                    <div class="arm left"></div>
                                </div>
                                <div class="shadow"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins250">
                            <div class="new_year_donat wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">Кейс 2</p>
                                    <p class="s_price">50 гривень</p>
                                </div>
                                <p class="s_info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam,
                                    repudiandae!
                                </p>
                                <div class="snowman">
                                    <div class="snowman-face"></div>
                                    <div class="snowman-nose"></div>
                                    <div class="mouth"></div>
                                    <div class="buttons"></div>
                                    <div class="arm right"></div>
                                    <div class="arm left"></div>
                                </div>
                                <div class="shadow"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins500">
                            <div class="new_year_donat wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">Кейс 3</p>
                                    <p class="s_price">100 гривень</p>
                                </div>
                                <p class="s_info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi,
                                    vitae!
                                </p>
                                <div class="snowman">
                                    <div class="snowman-face"></div>
                                    <div class="snowman-nose"></div>
                                    <div class="mouth"></div>
                                    <div class="buttons"></div>
                                    <div class="arm right"></div>
                                    <div class="arm left"></div>
                                </div>
                                <div class="shadow"></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins1000">
                            <div class="new_year_donat wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">Кейс 4</p>
                                    <p class="s_price">200 гривень</p>
                                </div>
                                <p class="s_info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus,
                                    tempore.
                                </p>
                                <div class="snowman">
                                    <div class="snowman-face"></div>
                                    <div class="snowman-nose"></div>
                                    <div class="mouth"></div>
                                    <div class="buttons"></div>
                                    <div class="arm right"></div>
                                    <div class="arm left"></div>
                                </div>
                                <div class="shadow"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="services" id="services">
                <p class="s_title wow fadeInUp" data-wow-delay="0.1s">Отримай привілею за донат з новорічною знижкою
                    30%</p>
                <div class="row s_boxes">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item1 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Quick</p>
                                <p class="s_price">9 гривень</p>
                            </div>
                            <p class="s_info">Нащо ж дворянство нам здалося, коли воно лиш горе приносе?</p>
                            <img class="s_img" id="s1" src="static/img/services/s1.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item2 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Baro</p>
                                <p class="s_price">19 гривень</p>
                            </div>
                            <p class="s_info">Дух тут важкий, от у селян мізки й гниють!</p>
                            <img class="s_img" id="s2" src="static/img/services/s2.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item3 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Vikont</p>
                                <p class="s_price">29 гривень</p>
                            </div>
                            <p class="s_info">Якщо зосередитись на боргу та відповідальності, а не на владі, для
                                ворожнечі майже не залишається місця.</p>
                            <img class="s_img" id="s3" src="static/img/services/s3.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item4 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Comte</p>
                                <p class="s_price">69 гривень</p>
                            </div>
                            <p class="s_info">Вважаю за краще не називати так швидко свого імені! Але за титулом —
                                граф!</p>
                            <img class="s_img" id="s4" src="static/img/services/s4.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item5 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Markiz</p>
                                <p class="s_price">99 гривень</p>
                            </div>
                            <p class="s_info">Ті, хто купують владу за гроші звикають отримувати з неї прибуток.</p>
                            <img class="s_img" id="s5" src="static/img/services/s5.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item6 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Prorex</p>
                                <p class="s_price">169 гривень</p>
                            </div>
                            <p class="s_info">Моліться за добробут верховної влади, бо, якби не страх перед нею,
                                люди ковтали б одне одного живцем.</p>
                            <img class="s_img" id="s6" src="static/img/services/s6.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item7 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Dux</p>
                                <p class="s_price">249 гривень</p>
                            </div>
                            <p class="s_info">І сів він, князюючи, в Києві, і мовив : «Хай буде се мати городам
                                руським»</p>
                            <img class="s_img" id="s7" src="static/img/services/s7.png">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="s_box item8 wow fadeInUp zoomIn" data-wow-delay="0.1s">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="s_name">Imperatrix</p>
                                <p class="s_price">329 гривень</p>
                            </div>
                            <p class="s_info">Ваша воля виконана: я імператор, але якою ціною, Боже мій! Ціною крові
                                моїх підданих!</p>
                            <img class="s_img" id="s8" src="static/img/services/s8.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="services" id="services">
                <p class="s_title wow fadeInUp" data-wow-delay="0.1s">Кейси</p>
                <div class="row s_boxes">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/casestatus1">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">1 кейс зі статусами</p>
                                    <p class="s_price">29 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте один зі статусів.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/casestatus3">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">3 кейси зі статусами</p>
                                    <p class="s_price">79 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте один зі статусів.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/casestatus5">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">5 кейсів зі статусами</p>
                                    <p class="s_price">119 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте один зі статусів.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/casestatus10">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">10 кейсів зі статусами</p>
                                    <p class="s_price">199 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте один зі статусів.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/caseqc1">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">1 кейс з QuickCoins</p>
                                    <p class="s_price">14 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте QuickCoins.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/caseqc3">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">3 кейси з QuickCoins</p>
                                    <p class="s_price">39 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте QuickCoins.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/caseqc5">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">5 кейсів з QuickCoins</p>
                                    <p class="s_price">59 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте QuickCoins.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/caseqc10">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">10 кейсів з QuickCoins</p>
                                    <p class="s_price">99 гривень</p>
                                </div>
                                <p class="s_info">З кейса ви гарантовано отримаєте QuickCoins.</p>
                                <img class="s_img" id="s1" src="static/img/services/case.png">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="services" id="services">
                <p class="s_title wow fadeInUp" data-wow-delay="0.1s">Отримай QuickCoins за донат</p>
                <div class="row s_boxes">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins100">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">+100 QuickCoins</p>
                                    <p class="s_price">20 гривень</p>
                                </div>
                                <p class="s_info">Отримай +100 QC на свій баланс та обмінюй їх на цінні предмети.</p>
                                <img class="s_img" id="s1" src="static/img/services/c5.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins250">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">+250 QuickCoins</p>
                                    <p class="s_price">50 гривень</p>
                                </div>
                                <p class="s_info">Отримай +250 QC на свій баланс та обмінюй їх на цінні предмети.</p>
                                <img class="s_img" id="s1" src="static/img/services/c6.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins500">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">+500 QuickCoins Бонус +10%</p>
                                    <p class="s_price">100 гривень</p>
                                </div>
                                <p class="s_info">Отримай +550 QC на свій баланс та обмінюй їх на цінні предмети.</p>
                                <img class="s_img" id="s1" src="static/img/services/c7.png">
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="https://quickworld.diaka.ua/quickcoins1000">
                            <div class="s_box wow fadeInUp zoomIn" data-wow-delay="0.1s">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="s_name">+1000 QuickCoins Бонус +20%</p>
                                    <p class="s_price">200 гривень</p>
                                </div>
                                <p class="s_info">Отримай +1200 QC на свій баланс та обмінюй їх на цінні предмети.</p>
                                <img class="s_img" id="s1" src="static/img/services/c8.png">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="services" id="services">
            <h1 class="s_title wow fadeInUp">Український сервер Minecraft - QuickWorld.fun</h1>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <ul class="col-lg-4 footer_menu">
                        <li>
                            <a class="goto_portfolio" href="mailto:quickworldfun@gmail.com">quickworldfun@gmail.com</a>
                        </li>
                        <li>
                            <a class="goto_portfolio" href="https://quickworld.fun/umovi-oplatu.html">Умови оплати</a>
                        </li>
                    </ul>
                    <div class="col-lg-4 footer_logo">
                        <img src="static/img/footer_logo2.png">
                    </div>

                    <div class="col-lg-4 shop_supports" style="color: #141414; font-size: 14px;
                    font-family: " Montserrat_Regular
                    ";">
                    © 2022 QuickWorld. Всі права захищені.
                </div>
            </div>
        </div>


        <div class="container">

        </div>
    </div>
    <div class="popup-bg">
        <div class="popup-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="scroll_items">
                    <div id="accordion">
                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s1-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Quick</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details" style="height: auto">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Унікальний набір - /kit quick</p>
                            <p>Кількість точок будинку (/home) - 3</p>
                            <p>Кількість регіонів (30х30х30) - 3</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 8</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Вбити свого персонажа - /suicide</p>
                            <p>Відкрити верстак в будь-якому місці - /craft</p>
                            <p>Відключити телепортації - /tptoggle</p>
                            <span>Вартість - 9грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s2-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Baro</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попереднього статусу - Quick</p>
                            <p>Унікальний набір - /kit baro</p>
                            <p>Кількість точок будинку (/home) - 6</p>
                            <p>Кількість регіонів (30х30х30) - 4</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 10</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Одягнути предмет на голову - /hat</p>
                            <p>Відновлення голоду - /feed</p>
                            <p>Ігнорування іншого гравця - /ignore</p>
                            <span>Вартість - 19грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s3-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Vikont</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit vikont</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Кількість точок будинку (/home) - 5</p>
                            <p>Кількість регіонів (30х30х30) - 5</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 12</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Очистити інвентар - /clear</p>
                            <p>Смітник - /trash</p>
                            <p>Відновлення здоров'я - /heal</p>
                            <span>Вартість - 29грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s4-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Comte</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit comte</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Множник монет з мобів - x2</p>
                            <p>Кількість точок будинку (/home) - 6</p>
                            <p>Кількість регіонів (30х30х30) - 6</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 15</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Доступ до ендер-сундука - /ec</p>
                            <p>Встановити персональний час- /ptime</p>

                            <span>Вартість - 69грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s5-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Markiz</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit markiz</p>
                            <p>Можливість зайти на заповнений сервер</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Множник монет з мобів - x2</p>
                            <p>Кількість точок будинку (/home) - 7</p>
                            <p>Кількість регіонів (30х30х30) - 7</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 20</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Переглянути інвентар гравця - /invsee</p>
                            <p>Переглянути гравців поряд - /near</p>
                            <p>Автоматичне сортування сундуків та бочок - /sort</p>

                            <span>Вартість - 149грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s6-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Prorex</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit prorex</p>
                            <p>Можливість зайти на заповнений сервер</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Множник монет з мобів - x3</p>
                            <p>Кількість точок будинку (/home) - 10</p>
                            <p>Кількість регіонів (30х30х30) - 10</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 25</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Автоматичне сортування інвентарю - /isort</p>
                            <p>Дізнатися координати гравця - /getpos</p>
                            <p>Дізнатися коли гравець був онлайн - /seen</p>

                            <span>Вартість - 169грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s7-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Dux</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit dux</p>
                            <p>Можливість зайти на заповнений сервер</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Множник монет з мобів - x4</p>
                            <p>Кількість точок будинку (/home) - 13</p>
                            <p>Кількість регіонів (30х30х30) - 13</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 35</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Відновити міцність предмета - /repair</p>
                            <p>Встановити день - /day</p>
                            <p>Переглянути ендер-сундук іншого гравця - /ec [логін]</p>
                            <span>Вартість - 249грн/30 днів</span>
                        </div>

                        <div class="status_item">
                            <div class="status_img">
                                <img src="static/img/status/s8-min.png" alt="">
                            </div>
                            <div class="status_tittle">Статус Imperatrix</div>
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div class="status_details">
                            <br>
                            <p class="command_list">Можливості:</p>
                            <p>Всі можливості попередніх статусів</p>
                            <p>Унікальний набір - /kit imperatrix</p>
                            <p>Можливість зайти на заповнений сервер</p>
                            <p>З мобів які заспавнились через спавнер випадають монети</p>
                            <p>Множник монет з мобів - x5</p>
                            <p>Кількість точок будинку (/home) - 15</p>
                            <p>Кількість регіонів (30х30х30) - 15</p>
                            <p>Кількість активних слотів на аукціоні (/ah) - 50</p>
                            <br>
                            <p class="command_list">Список команд:</p>
                            <p>Відключити повідомлення - /msgtoggle</p>
                            <p>Відновити міцність всіх предметів - /repair all</p>
                            <p>Включити сонячну погоду - /sun</p>
                            <p>Включити дощ - /rain</p>
                            <span>Вартість - 329грн/30 днів</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item1">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">100 грн</div>
                                <div class="active-price">100 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">100 грн</div>
                                <div class="active-price">100 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item2">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">2 грн</div>
                                <div class="active-price">2 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item3">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">3 грн</div>
                                <div class="active-price">3 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item4">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">4 грн</div>
                                <div class="active-price">4 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item5">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">5 грн</div>
                                <div class="active-price">5 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item6">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">6 грн</div>
                                <div class="active-price">6 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item7">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">7 грн</div>
                                <div class="active-price">7 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-bg-item8">
        <div class="popup-item-content">
            <div class="container">
                <div class="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="content">
                    <p>Виберіть термін</p>
                    <div class="variants">
                        <div class="variants-item">
                            <p>1 місяць</p>
                            <div class="price_row">
                                <div class="old-price">8 грн</div>
                                <div class="active-price">8 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                        <div class="variants-item">
                            <p>Назавжди</p>
                            <div class="price_row">
                                <div class="old-price">2500 грн</div>
                                <div class="active-price">2000 грн</div>
                            </div>
                            <div class="price_btn">
                                <a href="#">Купити</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="static/js/SmoothScroll.js"></script>
<script src="https://kit.fontawesome.com/18846f0aad.js" crossorigin="anonymous"></script>
<script src="static/js/owl.carousel.min.js"></script>
<script src="static/js/wow.min.js"></script>
<script src="static/js/main.js"></script>
<script type="text/javascript">
    new WOW().init();
</script>
</body>
</html>