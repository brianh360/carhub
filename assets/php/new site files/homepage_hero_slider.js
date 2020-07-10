<script>
	jQuery(document).ready(function($){

		var blog_posts = jQuery('.boxes.four_columns');
		var big = $('.carousel.hero-carousel');
		var testimonials = $('.partnersList .panel-transparent');

		big.slick({
			  dots: false,
			  infinite: true,
			  speed: 600,
			  slidesToShow: 1,
			  centerMode: false,
			  arrows: true,
			  prevArrow: $('.left-arrow'),
      		  nextArrow: $('.right-arrow'),

      		  responsive: [
                       
                            {
                              breakpoint: 800,
                              arrows: false,
                              draggable: true
                            }

                          ]
			});



		if ( jQuery(blog_posts).length > 0 ) {
		    console.log('blog posts initialized');
		    jQuery(blog_posts).addClass('d-flex container panel-transparent mt-5');
		    
		} 


			testimonials.slick({

			    arrows: false,
			    draggable: true,
			    slidesToShow: 4,
			    autoplay: true,
			     autoplaySpeed: 4000,

			 responsive: [
			    {
			      breakpoint: 1200,
			      settings: {
			        slidesToShow: 4,
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 4,
			      }
			    },
			    {
			      breakpoint: 576,
			      settings: {
			        slidesToShow: 3,
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 2,
			      }
			    }
			  ]

			  });



	});

</script>