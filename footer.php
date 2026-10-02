<footer class="footer">
    <div class="footer__container-top">
        <div class="footer__wrapper wrapper">
            <a class="footer__logo" href="index.html"><img src="<?php echo $GLOBALS['road']['logo']; ?>" alt="Road"></a>

            <nav class="footer__nav">

                <?php
                wp_nav_menu([
                    'theme_location' => 'menu_main_header',
                    'container' => 'ul',
                    'menu_class' => 'footer__nav-list',
                ]);
                ?>

                <button class="footer__button button-modal">
                    <svg xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#phone"></use>
                    </svg>
                    <?php echo carbon_get_theme_option('site_footer_btn_text' . carbon_lang_prefix()) ?>
                </button>
            </nav>
        </div>
    </div>

    <div class="footer__container-bottom">
        <div class="footer__wrapper wrapper">
            <p class="footer__copy"><?php echo carbon_get_theme_option('site_copyright') ?></p>

            <?php
            wp_nav_menu([
                'theme_location' => 'menu_footer',
                'container' => 'ul',
                'menu_class' => 'footer__links',
            ]);
            ?>
<!---->
<!--            <ul class="footer__links">-->
<!--                <li class="footer__link"><a href="#">Политика конфиденциальности</a></li>-->
<!--                <li class="footer__link"><a href="#">Обработка персональных данных</a></li>-->
<!--            </ul>-->

            <a class="footer__mail" href="mailto:<?php echo $GLOBALS['road']['email_support']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#letter"></use>
                </svg>
                <?php echo $GLOBALS['road']['email_support']; ?>
            </a>

            <ul class="footer__socials socials">
                <li class="socials__item"><a class="socials__link" href="<?php echo $GLOBALS['road']['youtube_url']; ?>"
                                             target="_blank">
                        <svg class="socials__icon" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#youtube"></use>
                        </svg>
                    </a></li>
                <li class="socials__item"><a class="socials__link"
                                             href="<?php echo $GLOBALS['road']['linkedin_url']; ?>" target="_blank">
                        <svg class="socials__icon" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#linked"></use>
                        </svg>
                    </a></li>
            </ul>
        </div>
    </div>
</footer>

<div class="modal-back hide">
    <div class="modal hide">
        <button class="modal__btn-close modal-close"></button>
        <h2 class="modal__title"><?php echo $GLOBALS['form']['title_modal']; ?></h2>
        <p class="modal__subtitle"><?php echo $GLOBALS['form']['about']; ?></p>
        <form class="modal__form main-form" method="post"
              action="<?php echo admin_url('admin-ajax.php?action=callback_mail') ?>">
            <div class="main-form__inputs">
                <label class="main-form__label main-form__label--big">
                    <input class="main-form__input" name="name" type="text" placeholder="<?php echo $GLOBALS['form']['placeholder_name']; ?>" required>
                </label>

                <label class="main-form__label main-form__label--big">
                    <input class="main-form__input" name="tel" type="tel" placeholder="<?php echo $GLOBALS['form']['placeholder_tel']; ?>" required>
                </label>

                <label class="main-form__label main-form__label--big">
                    <input class="main-form__input" name="message" type="text" placeholder="<?php echo $GLOBALS['form']['placeholder_message']; ?>" required>
                </label>

                <label style="display: none">
                    <input name="theme" type="text" value="<?php echo $GLOBALS['form']['title_modal']; ?>">
                </label>
            </div>

            <div class="main-form__message hide"><?php echo $GLOBALS['form']['message']; ?></div>

            <button class="main-form__button button button--orange"><span><?php echo $GLOBALS['form']['button']; ?></span></button>
            <p class="main-form__note"><?php echo $GLOBALS['form']['note']; ?></p>
        </form>
    </div>
    <div class="modal-overlay hide"></div>
</div>

</div>

<?php wp_footer(); ?>

</body>
</html>