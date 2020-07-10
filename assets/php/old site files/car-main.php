<div class="row">

    <div class="stm-image-container col-lg-12 col-12 left-half">
        <!--Gallery-->
            <?php get_template_part( 'partials/single-car/car', 'gallery' ); ?>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0;">
        <div class="stm-single-car-side">
            <?php
            if ( is_active_sidebar( 'stm_listing_car' ) ) {
                dynamic_sidebar( 'stm_listing_car' );
            } else {
                if(get_theme_mod('show_vin_history_btn', false)) {
                    do_action('stm_single_show_vin_history_btn');
                }

                ?>
                <div class="vehicle-info-container">
                    <h1 class="title h2"><?php the_title(); ?></h1>

                <?php

                /*<!--Prices-->*/
                get_template_part( 'partials/single-car/car', 'price' );

                
                /*<!--Financing-->*/
                get_template_part( 'partials/single-car/car', 'financing' );


                /*<!--Rating Review-->*/
                get_template_part( 'partials/single-car/car', 'review_rating' );


                /*<!--Calculator-->*/
                get_template_part( 'partials/single-car/car', 'calculator' );

                /*<!--Ship My Vehicle-->*/
                get_template_part( 'partials/single-car/car', 'vehicle-ship' );

                /*<!-- Payment Options -->*/
                get_template_part( 'partials/single-car/car', 'payment-options' );

                /*<!-- Disclaimer Info -->*/
                get_template_part( 'partials/single-car/car', 'disclaimer' );


        }
            ?>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12 right-half">

        <div class="stm-single-car-content">
            

            <!--Actions-->
            <?php get_template_part( 'partials/single-car/car', 'actions' ); ?>

            <!--Data-->
            <?php   get_template_part( 'partials/single-car/car', 'data' ); ?>

            <!--Warrant-->
            <?php   get_template_part( 'partials/single-car/car', 'warranty' ); ?>

            <!--MPG-->
            <?php get_template_part( 'partials/single-car/car', 'mpg' ); ?>

            <!--MPG-->
            <?php get_template_part( 'partials/single-car/car', 'dealership' ); ?>




            <!--Car Gurus if is style BANNER-->
            <?php if ( strpos( get_theme_mod( "carguru_style", "STYLE1" ), "BANNER" ) !== false ) get_template_part( 'partials/single-car/car', 'gurus' ); ?>
            <?php the_content(); ?>
        </div>
    </div>
</div>