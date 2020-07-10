<?php
//Getting gallery list
$post_id = get_the_ID();




$gallery = get_post_meta($post_id, 'gallery', true);
// echo print_r( $gallery );

$video_preview = get_post_meta($post_id, 'video_preview', true);
$gallery_video = get_post_meta($post_id, 'gallery_video', true);
$special_car = get_post_meta($post_id,'special_car', true);

$badge_text = get_post_meta($post_id,'badge_text',true);
$badge_bg_color = get_post_meta($post_id,'badge_bg_color',true);

if(empty($badge_text)) {
    $badge_text = 'Special';
}

$badge_style = '';
if(!empty($badge_bg_color)) {
    $badge_style = 'style=background-color:'.$badge_bg_color.';';
}

?>

<?php if(!has_post_thumbnail() and stm_check_if_car_imported($post_id)): ?>
	<img
		src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/images/automanager_placeholders/plchldr798automanager.png'); ?>"
		class="img-responsive"
		alt="<?php esc_attr_e('Placeholder', 'motors'); ?>"
		/>
<?php endif; ?>


<div class="stm-car-carousels">

	<!--New badge with videos-->
	<?php $car_media = stm_get_car_medias($post_id); ?>
	<?php if(!empty($car_media['car_videos_count']) and $car_media['car_videos_count'] > 0): ?>
		<div class="stm-car-medias">
			<div class="stm-listing-videos-unit stm-car-videos-<?php echo get_the_id(); ?>">
				<i class="fa fa-film"></i>
				<span><?php echo esc_html($car_media['car_videos_count']); ?> <?php esc_html_e('Video', 'motors'); ?></span>
			</div>
		</div>

		<script>
			jQuery(document).ready(function(){

				jQuery(".stm-car-videos-<?php echo get_the_id(); ?>").on('click', function() {
					jQuery(this).lightGallery({
                        dynamic: true,
                        dynamicEl: [
                            <?php foreach($car_media['car_videos'] as $car_video): ?>
                            {
                                src  : "<?php echo esc_url($car_video); ?>"
                            },
                            <?php endforeach; ?>
                        ],
                        download: false,
                        mode: 'lg-fade',
                    })
				}); //click
			}); //ready

		</script>
	<?php endif; ?>
	<?php if(!empty($special_car) and $special_car == 'on'): ?>
		<div class="special-label h5" <?php echo esc_attr($badge_style); ?>>
            <?php stm_dynamic_string_translation_e('Special Badge Text', $badge_text ); ?>
        </div>
	<?php endif; ?>

	<div class="stm-big-car-container col-lg-6">
		<ul class="pagination slick-paging">
				        <li class="prev">
				        	<img src="https://www.evolutionitservice.com/wp-content/uploads/2020/02/next-arrow_black2.svg" style="">
				        </li>
				        <li class="next">
				        	<img src="https://www.evolutionitservice.com/wp-content/uploads/2020/02/next-arrow_black2.svg">
				        </li>
		</ul>

		<div class="stm-big-car-gallery">
					
			<?php if(has_post_thumbnail()):

				$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
				$full_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full'); ?>
				<div class="stm-single-image" data-id="big-image-<?php echo esc_attr(get_post_thumbnail_id($post_id)); ?>">
					<a href="<?php echo esc_url($full_src[0]); ?>" class="stm_fancybox" rel="stm-car-gallery">
						<?php the_post_thumbnail('stm-img-796-466', array('class'=>'img-responsive')); ?>
					</a>
				</div>
			<?php endif; ?>



			<?php if(!empty($gallery)): ?>

				<?php foreach ( $gallery as $gallery_image ): ?>

					<?php $src = wp_get_attachment_image_src($gallery_image, 'stm-img-796-466'); ?>

					<?php $full_src = wp_get_attachment_image_src($gallery_image, 'full'); ?>

					<?php if(!empty($src[0]) && $gallery_image != get_post_thumbnail_id(get_the_ID())): ?>

						<div class="stm-single-image" data-id="big-image-<?php echo esc_attr($gallery_image); ?>">
							<a href="" class="" rel="">
								<img src="<?php echo esc_url($src[0]); ?>" alt="<?php printf(esc_attr__('%s full','motors'), get_the_title($post_id)); ?>"/>
							</a>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

	        <?php if(!empty($car_media['car_videos_posters']) and !empty($car_media['car_videos'])): ?>
	            <?php foreach($car_media['car_videos_posters'] as $k => $val):
	                $src = wp_get_attachment_image_src($val, 'stm-img-350-205');
	                $videoSrc = (isset($car_media['car_videos'][$k])) ? $car_media['car_videos'][$k] : '';
	                if(!empty($src[0])): ?>
	                    <div class="stm-single-image video-preview" data-id="big-image-<?php echo esc_attr($val); ?>">
	                        <a class="fancy-iframe" data-iframe="true" data-src="<?php echo esc_url($videoSrc); ?>">
	                            <img src="<?php echo esc_url($src[0]); ?>" class="img-responsive" alt="<?php esc_attr_e('Video preview', 'motors'); ?>"/>
	                        </a>
	                    </div>
	                <?php endif; ?>
	            <?php endforeach; ?>
	        <?php endif; ?>
    	</div>
	</div>

	<?php if(has_post_thumbnail() || ( !empty($video_preview) and !empty($gallery_video) ) ): ?>
		<div class="stm-thumbs-car-gallery col-lg-6">

			<?php if(has_post_thumbnail()):
				//Post thumbnail first ?>
				<div class="stm-single-image" id="big-image-<?php echo esc_attr(get_post_thumbnail_id($post_id)); ?>">
					<?php the_post_thumbnail('stm-img-350-205', array('class'=>'img-responsive')); ?>
				</div>
			<?php endif; ?>

			<?php if(!empty($video_preview) and !empty($gallery_video)): ?>
				<?php $src = wp_get_attachment_image_src($video_preview, 'stm-img-350-205'); ?>
				<?php if(!empty($src[0])): ?>
					<div class="stm-single-image video-preview" data-id="big-image-<?php echo esc_attr($video_preview); ?>">
						<a class="fancy-iframe" data-iframe="true" data-src="<?php echo esc_url($gallery_video); ?>">
							<img src="<?php echo esc_url($src[0]); ?>" alt="<?php esc_attr_e('Video preview', 'motors'); ?>"/>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>

            <?php if(!empty($gallery)): ?>

				<?php foreach ( $gallery as $gallery_image ): ?>
					<?php $src = wp_get_attachment_image_src($gallery_image, 'stm-img-350-205'); ?>
					<?php if(!empty($src[0]) && $gallery_image != get_post_thumbnail_id(get_the_ID()) && $gallery_image != $featured_image ): ?>
						<div class="stm-single-image" id="big-image-<?php echo esc_attr($gallery_image); ?>">
							<img src="<?php echo esc_url($src[0]); ?>" alt="<?php printf(esc_attr__('%s full','motors'), get_the_title($post_id)); ?>"/>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

            <?php if(!empty($car_media['car_videos_posters']) and !empty($car_media['car_videos'])): ?>
                <?php foreach($car_media['car_videos_posters'] as $k => $val):
                    $src = wp_get_attachment_image_src($val, 'stm-img-350-205');
                    $videoSrc = (isset($car_media['car_videos'][$k])) ? $car_media['car_videos'][$k] : '';
                    if(!empty($src[0])): ?>
                        <div class="stm-single-image video-preview" data-id="big-image-<?php echo esc_attr($video_preview); ?>">
                            <a class="fancy-iframe" data-iframe="true" data-src="<?php echo esc_url($videoSrc); ?>">
                                <img src="<?php echo esc_url($src[0]); ?>" alt="<?php esc_attr_e('Video preview', 'motors'); ?>"/>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

		</div>
	<?php endif; ?>
</div>


<!--Enable carousel-->
<script>
	jQuery(document).ready(function($){

		// here is where he defines the featured image and grabs it from the DOM ( front end of the site ), called "big"
		// he also defines the smaller gallery he plans to create below, called "small"
		// defines a flag, which is sort of like a stop light
		// and this value called "duration" which I can only assume will be used to control some sort of slide event, like in a moving slideshow
		var big = $('.stm-big-car-gallery');
		var small = $('.stm-thumbs-car-gallery');
		// $(big).hide();
		var flag = false;
		var duration = 800;
		var fImage = $('.stm-car-carousels .stm-big-car-gallery .stm-single-image .img-responsive');
		var imageHeight = $( fImage.height() );
		// console.log( imageHeight );
		var container = $('.stm-car-carousels');
		var containerHeight = imageHeight;
		$(container).height(containerHeight[0]);
		// console.log(containerHeight);

		// here is where he turns this featured image into a carousel. Then he defines how the carousel will look, and function:
		// Only use 1 image here, with no navigation options ( arrows, bullets, etc ), and no movement ( meaning no autoplay, shuffling images through the slide )
		big

		.slick({
			  dots: false,
			  infinite: true,
			  speed: 600,
			  slidesToShow: 1,
			  centerMode: false,
			  arrows: true,
			  prevArrow: $('.prev'),
      		  nextArrow: $('.next'),
			});


			// .owlCarousel({
			// 	// rtl: owlRtl,
			// 	items: 5,
			// 	smartSpeed: 800,
			// 	dots: false,
			// 	nav: false,
			// 	margin:0,
			// 	autoplay: false,
			// 	loop: false,
			// 	autoWidth:true,
			// 	responsiveRefreshRate: 1000
			// })
			// // adding event handler to the featured image carousel
			// // there are many images that are tagged as 
			// .on('changed.owl.carousel', function (e) {

			// 	$('.stm-thumbs-car-gallery .owl-item').removeClass('current');
			// 	$('.stm-thumbs-car-gallery .owl-item').eq(e.item.index).addClass('current');
			// 	if (!flag) {
			// 		flag = true;
			// 		small.trigger('to.owl.carousel', [e.item.index, duration, true]);
			// 		flag = false;
			// 	}
			// });

		small
			// .owlCarousel({
			// 	// rtl: owlRtl,
			// 	items: 5,
			// 	smartSpeed: 800,
			// 	dots: false,
			// 	margin: 0,
			// 	autoplay: false,
			// 	nav: false,
			// 	loop: false,
			// 	autoWidth:true,
			// 	navText: []
			// 	responsiveRefreshRate: 1000,
			// 	responsive:{
			// 		0:{
			// 			items:2
			// 		},
			// 		500:{
			// 			items:4
			// 		},
			// 		768:{
			// 			items:5
			// 		},
			// 		1000:{
			// 			items:5
			// 		}
			// 	}
			// })
			// .on('click', '.owl-item', function(event) {
			// 	big.trigger('to.owl.carousel', [$(this).index(), 400, true]);
			// })
			// .on('changed.owl.carousel', function (e) {
			// 	if (!flag) {
			// 		flag = true;
			// 		big.trigger('to.owl.carousel', [e.item.index, duration, true]);
			// 		flag = false;
			// 	}
			// });

			.slick({
				rows: 2,
				dots: false,
				arrows: false,
				infinite: true,
				speed: 300,
				slidesToShow: 2,
				slidesToScroll: 1,
				draggable: false,
				respondTo: 'min',
				adaptiveHeight: true
			});

			// On swipe event
			var oDirection = 0;
			var trackBackwards = 0;
			var flag = true;
			$(big).on('afterChange', function(event, slick, direction){
			  // console.log("current index: " + direction);
			   

			if ( oDirection + 1 == direction ) {
			    // moving forward
			     if (direction % 2 === 0 ) {
			    $(small).slick('slickNext');
			    if ( trackBackwards >= 2 ) {
			        trackBackwards = trackBackwards + 2;
			        flag = true;
			    } else {
			     trackBackwards = 2;
			    }
			  }
			    // console.log('old index: ' + oDirection);
			    oDirection++;

			}

			if ( oDirection - 1 == direction ) {
			    // moving backwards
			    if (trackBackwards % 2 === 0 && trackBackwards !== 0 ) {
			       
			        if (flag) {
			             $('.stm-thumbs-car-gallery').slick('slickPrev');
			             trackBackwards = trackBackwards - 2;
			             flag = false;
			        }   
			         else {
			            flag = true;
			        }
			    }
			 // console.log('old index: ' + oDirection);
			    oDirection--;
			   
			}

			 // console.log("track Backwards #: " + trackBackwards );

			    if (flag) {
			        // console.log('we are able to move backwards!');
			    } else {
			        // console.log('cannot move backwards');
			    }
			});

			$(window).resize(function(){		
				var fImage = $('.stm-car-carousels .stm-big-car-gallery .stm-single-image .img-responsive');
				var imageHeight = $( fImage.height() );
				console.log( imageHeight );

				var container = $('.stm-car-carousels');
				var containerHeight = imageHeight;
				$(container).height(containerHeight[0]);
				console.log(containerHeight);
			});
	})
</script>