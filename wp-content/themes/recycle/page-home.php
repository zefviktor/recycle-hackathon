<?php
    /*
    Template Name: page-home
    */

get_header();
?>

    <section class="hero">
        <div class="hero__background">
            <div class="container">

                <div class="hero__word">
                    <p class="hero__word-title">
                        Всі ми повинні відігравати роль
                        у захисті нашої природи.
                    </p>

                </div>

            </div>
            <div class="hero__arrow">
                <img class="" src="<?php echo get_stylesheet_directory_uri() ?>/img/arrow.png" alt=""/>
            </div>
        </div>
    </section>
    <section class="container">
        <h1 class="recycling">RECYCLING</h1>
        <div class="recycling__block">
            <div class="recycling__item">
                <p class="recycling__title">
                    РЕКОМЕНДАЦІЇ ПО СОРТУВАННЮ СМІТТЯ
                </p>
                <p class="recycling__subtitle">
                    Для новачків у сортуванні.
                </p>
                <p class="recycling__text">
                    1) Збирайте та сортуйте лише чисту сировину (без залишків їжі та жиру), тип якої ви зможете впевнено визначити(є код переробки у трикутнику).
                </p>
                <p class="recycling__text">
                    2) Все сміття слід ущільнювати, щоб воно займало менше місця.
                </p>
            </div>
            <div>
                <div class="">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/orel.png" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="recycling-items">
        <div class="container">
            <div class="section-3">
                <div class="section-3__item">
                    <img class="section-3__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/img-1.jpg" alt=""/>
                </div>

                <div class="section-3__item">
                    <img class="section-3__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/img-2.jpg" alt=""/>
                </div>

                <div class="section-3__item">
                    <img class="section-3__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/img-3.jpg" alt=""/>
                </div>
            </div>
        </div>
    </section>


    <section class="section-3-1__bg">
        <div class="container">
            <div class="section-3-1">
                <div class="section-3-1__item">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/item1.png" alt=""/>
                    <p class="section-3-1__text">органіка</p>
                </div>
                <div class="section-3-1__item">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/item2.png" alt=""/>
                    <p class="section-3-1__text">скло</p>
                </div>

                <div class="section-3-1__item">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/item3.png" alt=""/>
                    <p class="section-3-1__text">папір</p>
                </div>
                <div class="section-3-1__item">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/item4.png" alt=""/>
                    <p class="section-3-1__text">метал</p>
                </div>
                <div class="section-3-1__item">
                    <img class="section-3-1__item" src="<?php echo get_stylesheet_directory_uri() ?>/img/item5.png" alt=""/>
                    <p class="section-3-1__text">пластик</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-4__bg">
        <div class="container">
            <h3 class="section-4__text">Пункти переробки в м.Черкаси</h3>
            <div class="section-map ">
                <?php echo recycle_add_marker_loop() ?>
            </div>

        </div>
    </section>


<section class="form__bg">
    <div class="container">
        <div class="form">
            <p class="form__title">Зворотній зв’язок</p>
            <form action="" class="form__input" id="LocationForm" method="POST">
                <div class="form__input-one">
                    <div class="form__input-one-icon">
                        <label for="name" hidden="hidden">name</label>
                        <input type="text" id="name" name="name" class="form__input-text" placeholder="Ім'я">
                    </div>

                    <div class="form__input-one-icon">
                        <label for="email" hidden="hidden">email</label>
                        <input type="text" id="email" name="email" class="form__input-text" placeholder="Пошта">
                    </div>

                    <div class="form__input-one-icon">
                        <label for="location" hidden="hidden">subject</label>
                        <input type="text" id="location" name="location" class="form__input-text"
                               placeholder="Адреса пункту" value="<?php if ( isset( $_POST['location'] ) ) echo $_POST['location']; ?>">
                    </div>

                </div>
                <textarea id="message" name="message" class="form__input-two form__input-textarea"
                          placeholder="Коментар"></textarea>
                <div class="form__submit">
                    <input class="form__submit-button" type="submit" name="submit" id="submit" value="Відправити">
                </div>
            </form>
        </div>
    </div>
</section>


<style type="text/css">

    .acf-map {
        width: 100%;
        height: 400px;
        border: #ccc solid 1px;
        margin: 20px 0;
    }

    /* fixes potential theme css conflict */
    .acf-map img {
        max-width: inherit !important;
    }

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMzMGhRkitkgv72VxQb-4nbeCx4mPbwn0"></script>
<script type="text/javascript">
    (function($) {

        /*
        *  new_map
        *
        *  This function will render a Google Map onto the selected jQuery element
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	$el (jQuery element)
        *  @return	n/a
        */

        function new_map( $el ) {

            // var
            var $markers = $el.find('.marker');


            // vars
            var args = {
                zoom		: 16,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP
            };


            // create map
            var map = new google.maps.Map( $el[0], args);


            // add a markers reference
            map.markers = [];


            // add markers
            $markers.each(function(){

                add_marker( $(this), map );

            });


            // center map
            center_map( map );


            // return
            return map;

        }

        /*
        *  add_marker
        *
        *  This function will add a marker to the selected Google Map
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	$marker (jQuery element)
        *  @param	map (Google Map object)
        *  @return	n/a
        */

        function add_marker( $marker, map ) {

            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            // create marker
            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map
            });

            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow
            if( $marker.html() )
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open( map, marker );

                });
            }

        }

        /*
        *  center_map
        *
        *  This function will center the map, showing all markers attached to this map
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	4.3.0
        *
        *  @param	map (Google Map object)
        *  @return	n/a
        */

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ){

                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                bounds.extend( latlng );

            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 16 );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
            }

        }

        /*
        *  document ready
        *
        *  This function will render each map when the document is ready (page has loaded)
        *
        *  @type	function
        *  @date	8/11/2013
        *  @since	5.0.0
        *
        *  @param	n/a
        *  @return	n/a
        */
// global var
        var map = null;

        $(document).ready(function(){

            $('.acf-map').each(function(){

                // create map
                map = new_map( $(this) );

            });

        });

    })(jQuery);
</script>

<?php
get_footer();
?>

