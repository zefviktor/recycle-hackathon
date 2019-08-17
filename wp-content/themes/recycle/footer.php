<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam
 */

?>




<footer class="footer footer__background">
    <div class="container">
        <div class="footer__content">
            <div class="footer__content-one">
                <?php require "inc-html/logo.php"; ?>
                <div class="footer__content-newsletter">
                    <div>
                        <h4 class="footer__content-newsletter-text">
                            Підпишіться на наші новини
                        </h4>
                    </div>
                    <div  class="footer__content-newsletter-item">
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" rel="home">
                            <div class="item-social__text">
                                <i class="far fa-envelope"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer__content-line"></div>
            <div class="footer__content-two">
                <h6 class="footer__content-tranmautritam">
                    © 2019 Черкаси "RGB", eKreative Hackthon
                </h6>
                <div class="footer__content-item-social">
                    <div class="item-social">
                        <a href="https://www.facebook.com/" class="item-social__icon">
                            <div class="item-social__text">
                                <i class="fab fa-facebook-square"></i>
                            </div>
                        </a>
                        <a href="https://www.instagram.com/" class="item-social__icon">
                            <div class="item-social__text">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                        <a href="https://www.youtube.com/" class="item-social__icon">
                            <div class="item-social__text">
                                <i class="fab fa-youtube"></i>
                            </div>
                        </a>
                        <a href="https://twitter.com/" class="item-social__icon">
                            <div class="item-social__text">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>