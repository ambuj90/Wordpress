<?php
/**
 * The template for displaying the Show all post slider.
 *
 * This page template will display any functions hooked into the `Show all post slider` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the HomepShow all post slider page Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Show all post slider
 *
 
 */

get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/slick/slick.css"/>
<!-- // Add the new slick-theme.css if you want the default styling -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/slick/slick-theme.css"/>

		<main class="wp-block-group" >
            <div class ="slider_page_wrapper">
              <h1>Show all post slider</h1>
			  <?php
		    $args_array = array(
			'posts_per_page' => -1,
			'post_type'      => 'slick_slider',
			'post_status'    => 'publish',
			'orderby'        => 'post_type',
        	'order'          => 'DESC'
		);
		 $get_slick_slider_posts = get_posts( $args_array );

		//  echo '<pre>'; print_r( $get_slick_slider_posts); echo '</pre>';
		if ( $get_slick_slider_posts ) {
			echo '<div class = "custom-slider">';
			foreach ( $get_slick_slider_posts as $post ) :
				setup_postdata( $post );
				?>
				<div class ="post_wrapper">
				<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),  'full');  ?>
				<div class = "left_section"><img src ="<?php echo $featured_img_url; ?>" alt ="Image"></div>

				<div class = "right_section">
				<h2 class ="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="excerpt_text"><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
				</div>
				
			</div>
			<?php
			endforeach; 
			wp_reset_postdata();
			echo '</div>';
		}
?>



			  <!-- <div class="custom-slider">
                <div>your content 1</div>
                <div>your content 2</div>
                <div>your content 3</div>
				<div>your content 4</div>
                <div>your content 5</div>
                <div>your content 6</div>
            </div>
             </div> -->
		</main><!-- #main -->

		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/slick/slick.min.js"></script>

		<script>
			$(document).ready(function(){
				$('.custom-slider').slick({
             slidesToShow: 3,
             slidesToScroll: 1,
             autoplay: true,
             autoplaySpeed: 2000,
            });
			});
			
		</script>
<?php
get_footer(); ?>
