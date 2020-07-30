<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Neve
 * @since   1.0.0
 */

do_action( 'neve_before_primary_end' );
?>
</main><!--/.neve-main-->

<?php do_action( 'neve_after_primary' ); ?>

<?php
if ( apply_filters( 'neve_filter_toggle_content_parts', true, 'footer' ) === true ) {
	neve_before_footer_trigger();
	do_action( 'neve_do_footer' );
	neve_after_footer_trigger();
}
?>
<?php if ( is_active_sidebar( 'copy-right' ) ) : ?>
    
    <?php dynamic_sidebar( 'copy-right' ); ?>
    
<?php endif; ?>

</div><!--/.wrapper-->
<?php wp_footer(); ?>
<script>
$(document).ready(function(){
	$(window).scroll(function(){
  var sticky = $('.header'),
      scroll = $(window).scrollTop();

  if (scroll >= 1) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
	var url      = window.location.href;
	var arr = url.split('#')[1];
	//alert(arr);
	var sd = $( ".tablinks2.active .text" ).attr( "for" );
	$('.'+sd).addClass('active');
	$('.tablinks2 .text').click(function(){
		$('.tablinks2').removeClass('active');
		$(this).parent('.tablinks2').addClass('active');
		var df = $(this).attr('for');
		$('.clinic-expand-detail.clinic-detail').removeClass('active');
		$('.management-team-tab .wrap').removeClass('active');
		$('.'+df).addClass('active');
	});
	
	
    var urlHash = window.location.href.split("#")[1]
	var scrollTo = jQuery('#' + arr).offset().top - 200;
		jQuery('html,body').animate({
		 
		'scrollTop': scrollTo
		 
		}, 500);
		$( "#"+arr ).trigger( "click" );

	
});
</script>

</body>

</html>
