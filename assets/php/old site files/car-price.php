<?php
$price = get_post_meta(get_the_ID(), 'price', true);
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
                <span class="h3"><?php echo esc_attr(stm_listing_price_view($price)); ?></span>
            <?php endif; ?>
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


