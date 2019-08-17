<?php
    /*
    Template Name: page-gallery
    */

get_header();
?>


        <section id="portfolio"class="portfolio">
            <div class="portfolio__content container">
                <p class="portfolio__title">Сортування сміття за видами</p>
                <div class="portfolio__content-two container">
                    <div class="item-persons">
                        <div class="posts-gride">
                        <?php

                        // WP_Query arguments
                        $args = array(
                            'post_type' => array('gallery'),
                            'post_status' => array('publish'),
                            'posts_per_page' => 10,
                            'order' => 'ASC',
                        );

                        // The Query
                        $gallery = new WP_Query( $args );

                        // The Loop
                        if ( $gallery->have_posts() ) {
                            while ( $gallery->have_posts() ) {
                                $gallery->the_post();
                                ?>
                                    <div class="post-item">
                                        <div class="item-persons__img">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="item-persons__icon"></div>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="item-persons__item">
                                                <div class="item-persons__content">
                                                    <h3 class="item-persons__content-title">
                                                        <?php the_title(); ?>
                                                    </h3>
                                                    <h4 class="item-persons__content-subtitle">
                                                        <?php the_content(); ?>
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php

                            }
                        } else {
                            echo 'No posts found';
                        }

                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<!--************************-->





<?php
get_footer();
?>

