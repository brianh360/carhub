<?php

$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
$engine = get_post_meta(get_the_ID(), 'engine', true);
$transmission = get_post_meta(get_the_ID(), 'transmission', true);
$drive = get_post_meta(get_the_ID(), 'drive train', true);
$exterior_color = get_post_meta(get_the_ID(), 'exterior color', true);
$interior_color = get_post_meta(get_the_ID(), 'interior color', true);
$mileage = get_post_meta(get_the_ID(), 'mileage', true);
$stock = get_post_meta(get_the_ID(), 'stock', true);
$vin = get_post_meta(get_the_ID(), 'vin', true);

$sales_tax = echo esc_attr(stm_listing_price_view($price));

?>



<div class="cash-details-container">
	<div class="inner">
		<div class="header-info column">
			<h1 class="uppercase">Cash details</h1>
			<h5 class="car-name" id="car-name"><?php the_title(); ?></h5>
    <div class="sep-lgt-gray" style=""></div>
		</div>

		<div class="car main-info-container" id="main-info-container">
			<div class="inner">
				<div class="car-info row">

					<div class="car-image-container w-3rd" style="">
    <img class="car-image" src="<?php echo ( esc_url ( $featured_image ) ); ?>">
</div>

					
<div class="car-spec row space-between" style="">
    <div class="car-specifics column">
						<p class="u-muted engine"><?php echo esc_attr ( $engine ); ?></p>
						<p class="u-muted transmission"><?php echo esc_attr ( $transmission ); ?></p>
						<p class="u-muted drive"><?php echo esc_attr ( $drive ); ?></p>
					</div>


					<div class="color-container" id="color-container" style="
">
						<div class="color column">
							<p class="exterior"><?php echo esc_attr ( $exterior_color ); ?></p>
							<p class="interior">
								<span class="u-muted uppercase">Interior: </span>
								<?php echo esc_attr ( $interior_color ); ?>
							</p>
						</div>
					</div>

				</div>
</div>
			</div>
		</div>

		<div class="sep-lgt-gray" style=""></div><div class="car secondary-info-container" id="secondary-info-container">
			<div class="inner">
				<div class="car-info row j-center" style="">

					<div class="car mileage" style="">
						<h5 class="mileage"><span class="bold">Mileage: </span> <?php echo esc_attr ( $mileage ); ?></h5>
					</div>

					<div class="car stock" style="">
						<h5 class="stock"><span class="bold">Stock: </span> <?php echo esc_attr ( $stock ); ?></h5>
					</div>

					<div class="car vin" style="">
						<h5 class="mileage"><span class="bold">VIN: </span> <?php echo esc_attr ( $vin ); ?></h5>
					</div>
            	</div>
            </div>
        </div><div class="sep-lgt-gray" style=""></div>

        <div class="car pricing-info" id="pricing-info">
        	<div class="inner">
				<div class="car-info column" style="">

<div class="row spaced-row" style="">

					<p class="uppercase carhub-price bold main">Car Hub Price</p>
					<p class="price" style="
"><?php echo esc_attr(stm_listing_price_view($price)); ?></p>
    </div>
<div class="row spaced-row price-row" style="">

					<p class="capitalize carhub-price" style="">Document processing charge</p>
					<p class="price" style="">$65</p>
    </div><div class="row spaced-row price-row" style="">

					<p class="capitalize carhub-price" style="
                                               ">emission testing charge <span class="u-muted">( smog test )</span></p>
					<p class="price" style="">$50</p>
    </div><div class="row spaced-row price-row" style="">

					<p class="carhub-price w-half"><span class=" bold">Sales Tax </span>(CA, 9.5%)</p>
					<p class="price w-half">$485.93</p>
    </div>
</div>
				
			</div>
		</div>

		   <div class="sep-lgt-gray" style=""></div><div class="car pricing-info" id="pricing-info">
        	<div class="inner">
				<div class="row spaced-row" style="">

					<p class="uppercase carhub-price bold">Amount paid to public officials</p>
					<p class="price text-right" style="">$34,988</p>
    </div><div class="car-info column price-row" style="">


<div class="row spaced-row" style="">

					<p class="capitalize carhub-price" style="">Estimated <span class="uppercase">dmv</span> registration fees</p>
					<p class="price" style="">$150</p>
    </div><div class="row spaced-row" style="">

					<p class="capitalize carhub-price" style="
                                               ">License plate fees</p>
					<p class="price" style="
">$21</p>
    </div><div class="row spaced-row" style="
">

					<p class="capitalize carhub-price w-half">state emission certification fee</p>
					<p class="price w-half">$8.25</p>
    </div>
</div>
				
			</div>
		</div><div class="sep-lgt-gray" style=""></div><div class="car pricing-info fee-info spaced-row" id="fee-info">
        	<div class="inner">
				



<div class="car-info row spaced-row">
					<p class="carhub-price uppercase"><span class=" bold uppercase">Total purchase price</span></p>
					<p class="price">$5,780.18</p>
</div>

				
			</div>
		</div>

		<div class="sep-lgt-gray" style=""></div>
       <div class="link-container column align-center" style="
">
           <a href="#" target="_blank" class="">Used Vehicle Contract Cancellation</a>
          <p class="bottomless" style=""> <a href="#" target="_blank" class="">Option Agreement</a> <span>will be offered upon purchase. </span></p>
        </div> 

		<div class="sep-lgt-gray" style=""></div>
        
        <div class="disclaimer-container">
			<div class="inner">
				<p class="small text u-muted">**Price excludes government fees and taxes, $65 document processing charge (not required by law), and any emission testing charge. Price assumes that final purchase will be made in the State of CA, unless vehicle is non-transferable. Applicable registration fees are due in advance of vehicle delivery and are separate from sales transactions. Any shipping cost is additional and separate from price of vehicle.</p>

				<p class="small text u-muted"> **While Car Hub try to make sure all information posted here is accurate, we cannot be responsible for typographical and other errors (e.g., data transmission) that may appear on the site. If the posted price (including finance and lease payments) for a vehicle is incorrect, Car Hub will endeavor to provide you with the correct prices as soon as we become aware of the error. In the event a vehicle is priced incorrectly, Car Hub shall have the right to refuse or cancel any orders placed for the vehicle presented with the incorrect price. In addition, vehicle prices are subject to change and all vehicles are subject to prior sale and may not be available when you are ready to purchase. Please contact Car Hub for most current information.</p>
			</div>
		</div>

	</div>
</div>