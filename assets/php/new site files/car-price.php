<?php
$data = apply_filters( 'stm_single_car_data', stm_get_single_car_listings() );
$price = get_post_meta(get_the_ID(), 'price', true);
$mileage = get_post_meta(get_the_ID(), 'mileage', true);
$sale_price = get_post_meta(get_the_ID(), 'sale_price', true);

$regular_price_label = get_post_meta(get_the_ID(), 'regular_price_label', true);
$regular_price_description = get_post_meta(get_the_ID(), 'regular_price_description', true);
$special_price_label = get_post_meta(get_the_ID(), 'special_price_label', true);
$instant_savings_label = get_post_meta(get_the_ID(), 'instant_savings_label', true);

//Get text price field
$car_price_form = get_post_meta(get_the_ID(), 'car_price_form', true);
$car_price_form_label = get_post_meta(get_the_ID(), 'car_price_form_label', true);


$show_price = true;
$show_sale_price = true;

if (empty($price)) {
    $show_price = false;
}

if (empty($sale_price)) {
    $show_sale_price = false;
}

if (!empty($price) and empty($sale_price)) {
    $show_sale_price = false;
}

if (!empty($price) and !empty($sale_price)) {
    if (intval($price) == intval($sale_price)) {
        $show_sale_price = false;
    }
}

if (empty($price) and !empty($sale_price)) {
    $price = $sale_price;
    $show_price = true;
    $show_sale_price = false;
}
?>




<?php //SINGLE REGULAR PRICE ?>
<?php if ($show_price and !$show_sale_price){ ?>

    <?php if (!empty($car_price_form) and $car_price_form == 'on'): ?>
        <a href="#" class="rmv_txt_drctn" data-toggle="modal" data-target="#get-car-price">
    <?php endif; ?>

    <div class="single-car-prices">
        <div class="single-regular-price text-center">

            <?php if (!empty($car_price_form_label)): ?>
                <span class="h3"><?php echo esc_attr($car_price_form_label); ?></span>
            <?php else: ?>
                <?php if (!empty($regular_price_label)): ?>
                    <span class="labeled"><?php stm_dynamic_string_translation_e('Regular Price Label', $regular_price_label); ?></span>
                <?php endif; ?>
                <span class="h3"><?php echo esc_attr(stm_listing_price_view($price)); ?>*</span>
                <div href="#" class="price" data-micromodal-trigger="modal-1" style=""><p class="price-details"><span class="information-icon">i</span>Cash Price Details</p></div>
            <?php endif; ?>
        </div>
        <div class="u-muted" style="">
            <p>Car Hub  Price (excl. taxes &amp; fees)</p>
        </div>

        <?php if ( !empty( $mileage ) ) {
                    $mileage = number_format($mileage);
                }
        ?>

             <div class="car-info-extended">
                <h5 class="mileage"><span class="bold">Mileage: </span> <?php echo $mileage; ?></h5>
            </div>

            <div>
                <a href="#" target="carfax" class="u-hoverMuted carfax"><img width="104" height="27" alt="CARFAX Vehicle History Report" src="https://roadster.com/assets/logo-carfax-vhr-19c53ccfeed4d0df9b5f6f1cccd321e87ba7bdab666fb8a6381d29142e31f1e2.png"></a>
            </div>

              <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                  <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                       <?php get_template_part( 'partials/single-car/car', 'modal' ); ?>
                    </main>
                  </div>
                </div>
              </div>

    </div>







    <?php if (!empty($car_price_form) and $car_price_form == 'on'): ?>
        </a>
    <?php endif; ?>


    <?php if (!empty($regular_price_description)): ?>
        <div class="price-description-single"><?php stm_dynamic_string_translation_e('Regular Price Description', $regular_price_description); ?></div>
    <?php endif; ?>

<?php } ?>
<?php //SINGLE REGULAR && SALE PRICE ?>
<?php if ($show_price and $show_sale_price){ ?>

    <div class="single-car-prices">
        <?php if (!empty($car_price_form) and $car_price_form == 'on'): ?>
            <a href="#" class="rmv_txt_drctn" data-toggle="modal" data-target="#get-car-price">
                <div class="single-regular-price text-center">
                <?php if (!empty($car_price_form_label)): ?>
                    <span class="h3"><?php echo esc_attr($car_price_form_label); ?></span>
                <?php endif; ?>
                </div>
            </a>
        <?php else: ?>
        <div class="single-regular-sale-price">
            <table>
                <tr>
                    <td>
                        <div class="regular-price-with-sale">
                            <?php if (!empty($regular_price_label)):
                                stm_dynamic_string_translation_e('Regular Price Label', $regular_price_label);
                            endif; ?>
                            <?php /*if (!empty($car_price_form_label)): ?>
                                <strong><?php echo esc_attr($car_price_form_label); ?></strong>
                            <?php else: */?>
                                <strong>
                                    <?php echo esc_attr(stm_listing_price_view($price)); ?>
                                </strong>
                            <?php /*endif; */?>

                        </div>
                    </td>
                    <td>
                        <?php if (!empty($special_price_label)): ?>
                            <?php stm_dynamic_string_translation_e('Special Price Label', $special_price_label);
                            $mg_bt = '';
                        else:
                            $mg_bt = 'style=margin-top:0';
                        endif; ?>
                        <div class="h4" <?php echo esc_attr($mg_bt); ?>><?php echo esc_attr(stm_listing_price_view($sale_price)); ?></div>
                    </td>
                </tr>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <?php if ($car_price_form == '' && !empty($instant_savings_label)): ?>
        <?php $savings = intval($price) - intval($sale_price); ?>
        <div class="sale-price-description-single">
            <?php stm_dynamic_string_translation_e('Instant Savings Label', $instant_savings_label); ?>
            <strong> <?php echo esc_attr(stm_listing_price_view($savings)); ?></strong>
        </div>
    <?php endif; ?>
<?php } ?>

<?php if(!$show_price and !$show_sale_price && !empty($car_price_form_label)) {?>
	<?php if (!empty($car_price_form) and $car_price_form == 'on'): ?>
		<a href="#" class="rmv_txt_drctn" data-toggle="modal" data-target="#get-car-price">
	<?php endif; ?>

	<div class="single-car-prices">
		<div class="single-regular-price text-center">
			<span class="h3"><?php echo esc_attr($car_price_form_label); ?></span>
		</div>
	</div>

	<?php if (!empty($car_price_form) and $car_price_form == 'on'): ?>
		</a>
	<?php endif; ?>

	<?php if (!empty($regular_price_description)): ?>
		<div class="price-description-single"><?php stm_dynamic_string_translation_e('Regular Price Description', $regular_price_description); ?></div>
	<?php endif; ?>
<?php } ?>


