<?php
/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();

?>
	<div class="<?php echo esc_attr( $container_class ); ?> single-post-container">
		<div class="row">
			<?php do_action( 'neve_do_sidebar', 'single-post', 'left' ); ?>
			<article id="post-<?php echo esc_attr( get_the_ID() ); ?>"
					class="<?php echo esc_attr( join( ' ', get_post_class( 'nv-single-post-wrap col' ) ) ); ?>">
				<?php
				do_action( 'neve_before_post_content' );
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$content = get_post_meta( get_the_ID(),'content_p', true );
						$img = get_post_meta( get_the_ID(),'image_p', true );
						$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
						$url = $src[0];
						//get_template_part( 'template-parts/content', 'single' );
						?>
						<div class="nv-content-wrap entry-content">
							<div class="about block-top height-block">
								<div class="row mr-0 ml-0 wrap-container">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 lf info salve_stick">
										<div class="col-4 product-image">
											<img src="<?php echo $url; ?>">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 rt image pr-0 pl-0">
										<div class="col-12 product-text">
											<div class="header-title">
												<h1 class="product-title"><?php echo get_the_title(get_the_ID()); ?></h1>
												<a href="/product.html" class="back">
													<i class="fa fa-arrow-left"></i>Back to HCP Products
												</a>
											</div>
											<span><?php echo $content; ?></span>
										</div>
										<div class="col-12 product-label">
											<img src="<?php echo $img; ?>" alt="about1"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}
				do_action( 'neve_after_post_content' );
				?>
			</article>
			<?php do_action( 'neve_do_sidebar', 'single-post', 'right' ); ?>
		</div>
	</div>
<?php
get_footer();
