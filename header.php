<!DOCTYPE html>
<html lang="ru">
<head>
    <!--  Мета тэги  -->
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->


    <?php
    $useragent=$_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        /* DESKTOP MODE */
        ?>

        <meta name="viewport" content="width=1170, initial-scale=1.0">
        <?php
    } else {
        // DEFAULT
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
    }
    ?>


    <meta name="author" content="RoadAR">
    <meta name="description"
          content="Система видеоаналитики для детектирования событий, опасных и потенциально опасных ситуаций">
    <meta name="keywords"
          content="видеоаналитика, дтп, детекция, мониторинг, видеообнаружение, компьютерное зрение, слежение, охранные службы">
    <meta http-equiv="Reply-To" content="info@roadar.ai">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title><?php

        if (is_post_type_archive('product')) {
            echo $GLOBALS['prod']['name'];
        } else the_title()

        ?></title>

    <?php wp_head(); ?>
</head>
<body>

<div>
    <svg style="width:0;height:0;position:absolute;" aria-hidden="true" focusable="false">
        <symbol id="eye" viewBox="0 0 28 18">
            <path d="M14 18c-4.3 0-8.3-1.8-11.4-5.1-.4-.4-.4-1 0-1.4s1-.4 1.4 0c2.8 2.9 6.3 4.5 10 4.5 4.8 0 9.1-2.6 11.8-7-2.7-4.4-7.1-7-11.8-7C9.1 2 4.5 4.8 1.9 9.5c-.3.5-.9.6-1.4.4C0 9.6-.1 9 .1 8.5 3.1 3.2 8.3 0 14 0s10.9 3.2 13.9 8.5c.2.3.2.7 0 1-3 5.3-8.2 8.5-13.9 8.5z"/>
            <path d="M14 14c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z"/>
        </symbol>

        <symbol id="phone" viewBox="0 0 402 402">
            <path d="M294.6 402c-15.6-.1-31.2-2.1-46.4-5.9-52.4-12.6-106.4-44.7-152-90.4s-77.7-99.6-90.4-152C-7.4 98.7 2.1 51.5 32.6 21l8.7-8.7c16.5-16.4 43.1-16.4 59.6 0L151 62.4c16.5 16.5 16.5 43.2 0 59.6l-29.6 29.6c14.2 24.9 33.5 49.8 56.3 72.6s47.8 42.1 72.6 56.3l29.6-29.6c16.5-16.5 43.1-16.5 59.6 0l50.1 50.1c16.5 16.5 16.5 43.1 0 59.6l-8.7 8.7c-21.5 21.6-51.3 32.7-86.3 32.7zM71.1 29.9c-3.2 0-6.3 1.3-8.6 3.6l-8.7 8.7c-22.9 22.9-29.6 60-18.8 104.5 11.4 47.1 40.6 96.1 82.4 137.9s90.7 71 137.9 82.4c44.5 10.7 81.6 4.1 104.5-18.8l8.7-8.7c4.7-4.7 4.7-12.4 0-17.2l-50.1-50.1c-4.7-4.7-12.4-4.7-17.2 0l-37.5 37.5c-4.6 4.6-11.7 5.7-17.5 2.7-30.8-15.9-61.8-39-89.6-67s-51-58.9-66.9-89.6c-3-5.8-1.9-12.9 2.7-17.5l37.5-37.5c4.7-4.7 4.7-12.4 0-17.2L79.8 33.5c-2.4-2.3-5.5-3.6-8.7-3.6z"/>
            <path d="M310.7 221.6c-8.3 0-15-6.7-15-15-.1-54.8-44.5-99.2-99.3-99.3-8.3 0-15-6.7-15-15s6.7-15 15-15c71.3 0 129.3 58 129.3 129.3 0 8.3-6.8 15-15 15z"/>
            <path d="M374 221.6c-8.3 0-15-6.7-15-15 0-89.7-73-162.7-162.6-162.7-8.3 0-15-6.7-15-15s6.7-15 15-15c106.2 0 192.6 86.4 192.6 192.7 0 8.3-6.7 15-15 15z"/>
        </symbol>

        <symbol id="letter" viewBox="0 0 26 18">
            <path d="M25 6c-.6 0-1 .4-1 1v8c0 .6-.4 1-1 1H3c-.6 0-1-.4-1-1V7c0-.6-.4-1-1-1s-1 .4-1 1v8c0 .8.3 1.6.9 2.1.5.6 1.3.9 2.1.9h20c.8 0 1.6-.3 2.1-.9.6-.6.9-1.3.9-2.1V7c0-.6-.4-1-1-1z"/>
            <path d="M12.4 11.8c.4.3.8.3 1.2 0l11.8-8.9c.4-.3.5-.8.3-1.2-.1-.3-.3-.6-.6-.8C24.6.3 23.8 0 23 0H3C2.2 0 1.4.3.9.9c-.3.2-.5.5-.6.8-.2.4-.1 1 .3 1.2l11.8 8.9zM3 2h20.3L13 9.8 2.7 2H3z"/>
        </symbol>

        <symbol id="linked" viewBox="0 0 64 64">
            <path d="M8 54.7c0 .7.6 1.3 1.3 1.3h9.3c.7 0 1.3-.6 1.3-1.3V23.9c0-.7-.6-1.3-1.3-1.3H9.3c-.7 0-1.3.6-1.3 1.3v30.8zm38.6-32.4c-4.5 0-7.7 1.8-9.4 3.7-.4.4-1.1.1-1.1-.5v-1.6c0-.7-.6-1.3-1.3-1.3h-9.4c-.7 0-1.3.6-1.3 1.3.1 5.7 0 25.4 0 30.7 0 .7.6 1.3 1.3 1.3h9.5c.7 0 1.3-.6 1.3-1.3V37.9c0-1 0-2 .3-2.7.8-2 2.6-4.1 5.7-4.1 4.1 0 6 3.1 6 7.6v15.9c0 .7.6 1.3 1.3 1.3h9.3c.7 0 1.3-.6 1.3-1.3V37.4c-.1-10.3-6-15.1-13.5-15.1zm-32.7-3.4c3.8 0 6.1-2.4 6.1-5.4-.1-3.2-2.3-5.5-6-5.5s-6 2.3-6 5.4 2.3 5.5 5.9 5.5z"/>
        </symbol>

        <symbol id="youtube" viewBox="0 0 1000 1000">
            <path d="M979.1 259.3c-11.5-43-45.4-76.9-88.4-88.4C812.7 150 500 150 500 150s-312.7 0-390.7 20.9c-43 11.5-76.9 45.4-88.4 88.4C0 337.3 0 500 0 500s0 162.7 20.9 240.7c11.5 43 45.4 76.9 88.4 88.4C187.3 850 500 850 500 850s312.7 0 390.7-20.9c43-11.5 76.9-45.4 88.4-88.4C1000 662.7 1000 500 1000 500s0-162.7-20.9-240.7zM400 650V350l259.8 150L400 650z"/>
        </symbol>

        <linearGradient id="gradient-blue" x2="1" y2="1">
            <stop offset='0%' stop-color='#2CAEAE'/>
            <stop offset='100%' stop-color='#82FFFF'/>
        </linearGradient>

        <linearGradient id="gradient-orange" x2="1" y2="1">
            <stop offset='0%' stop-color='#B9610C'/>
            <stop offset='100%' stop-color='#FF840D'/>
        </linearGradient>
    </svg>
</div>

<div class="content">

    <?php
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        /* DESKTOP MODE */
        ?>
        <?php echo 'Это моб'; ?>
        <?php
    } else {
        // DEFAULT
        ?>
        <?php echo 'Это пк'; ?>
        <?php
    }
    ?>

    <?php if (is_front_page()) : ?>
    <header class="header header--main">
        <?php else : ?>
        <header class="header">
            <?php endif; ?>

            <div class="header__wrapper wrapper">

                <?php if (is_front_page()) : ?>
                    <a class="header__logo"><img src="<?php echo $GLOBALS['road']['logo']; ?>" alt="Road"></a>
                <?php else : ?>
                    <a class="header__logo" href="<?php echo get_home_url(); ?>"><img
                                src="<?php echo $GLOBALS['road']['logo']; ?>" alt="Road"></a>
                <?php endif; ?>

                <button class="header__mobile-btn close"></button>

                <nav class="header__nav close">

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'menu_main_header',
                        'container' => 'ul',
                        'menu_class' => 'header__nav-list',
                    ]);
                    ?>

                    <button class="header__button button-modal">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#eye"></use>
                        </svg>
                        <?php echo carbon_get_theme_option('site_header_btn_text' . carbon_lang_prefix()) ?>
                    </button>
                </nav>

                <?php
                $translations__current = pll_the_languages(array(
                    "raw" => 1,
                ));

                $translations = pll_the_languages(array(
                    "raw" => 1,
                    "hide_current" => 1
                ));
                ?>


                <div class="header__languages languages">
                    <div class="languages__container">
                    <span class="languages__selected"
                          type="button" id="dropdownLangButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="languages__icon" src="<?= $translations__current[pll_current_language()]['flag'] ?>"
                             alt="<?= $translations__current[pll_current_language()]['name'] ?>">
                    </span>
                        <div class="languages__list dropdown-menu dropdown-menu-right"
                             aria-labelledby="dropdownLangButton">
                            <?php foreach ($translations as $item) : ?>
                                <a class="languages__item dropdown-item <?= ($item['current_lang']) ? 'disabled' : '' ?>"
                                   href="<?= $item['url'] ?>">
                                    <img class="languages__icon" src="<?= $item['flag'] ?>" alt="<?= $item['name'] ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </header>