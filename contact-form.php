<section class="contact">
    <div class="contact__wrapper wrapper">
        <div class="contact__container">
            <form class="contact__form main-form" method="post" action="<?php echo admin_url('admin-ajax.php?action=callback_mail') ?>">
                <h2 class="main-form__title title"><?php echo $GLOBALS['form']['title']; ?></h2>

                <div class="main-form__inputs">
                    <label class="main-form__label main-form__label--small">
                        <input class="main-form__input" name="name" type="text" placeholder="<?php echo $GLOBALS['form']['placeholder_name']; ?>" required>
                    </label>

                    <label class="main-form__label main-form__label--small">
                        <input class="main-form__input" name="tel" type="tel" placeholder="<?php echo $GLOBALS['form']['placeholder_tel']; ?>" required>
                    </label>

                    <label class="main-form__label main-form__label--big">
                        <input class="main-form__input" name="message" type="text" placeholder="<?php echo $GLOBALS['form']['placeholder_message']; ?>" required>
                    </label>

                    <label style="display: none">
                        <input name="theme" type="text" value="<?php echo $GLOBALS['form']['title']; ?>">
                    </label>
                </div>

                <div class="main-form__message hide"><?php echo $GLOBALS['form']['message']; ?></div>

                <button class="main-form__button button button--orange"><span><?php echo $GLOBALS['form']['button']; ?></span></button>

                <p class="main-form__note"><?php echo $GLOBALS['form']['note']; ?></p>
            </form>
        </div>
    </div>
</section>