<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package vorosa
*/
get_header(); 
	if( have_posts() ) :
?>
<?php
	$causes_form_shortcode = get_post_meta(get_the_ID(),'_vorosa_causes_form_shortcode',true);
	$causes_form_link = get_post_meta(get_the_ID(),'_vorosa_causes_form_link',true);
	$causes_form_bitton_text = get_post_meta(get_the_ID(),'_vorosa_causes_form_button_text',true);
	$causes_donate_option_select = get_post_meta(get_the_ID(),'_vorosa_donate_option_select',true);
	$causes_form_box_additional_text = get_post_meta(get_the_ID(),'_vorosa_causes_form_additional_text',true);
?>				
<div class="page-area causes-all-area ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="causes-img-text">
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('vorosa_causes_img'); ?>
						<?php endif; ?>
						<div class="causes-text">
							<?php the_content(); ?>
						</div>
					</div>
					<?php
				// End the loop.
				endwhile;
				?>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<div class="donation-area">
							<?php
							if ( isset( $causes_donate_option_select ) && 'link' != $causes_donate_option_select ) { ?>
							<div class="donation-box">
								<?php if($causes_form_shortcode) : 
									if(function_exists('causes_form_shortcode_core')){
										causes_form_shortcode_core($causes_form_shortcode);
									} 
								endif; ?>
							</div>
							<?php } else { ?>
							<?php if ( !empty( $causes_form_link ) || !empty( $causes_form_bitton_text ) ) : ?>	
							<div class="donation-box ovh">
								<div class="give-btn-wrapper">
									<?php if ( isset( $causes_form_box_additional_text ) ) : ?>
									<h3><?php echo esc_html( $causes_form_box_additional_text ); ?></h3>
									<?php endif; ?>								
									<a class="give-btn" href="<?php echo esc_url($causes_form_link); ?>"> <?php echo esc_html( $causes_form_bitton_text ); ?> </a>
								</div>
							</div>
							<?php endif; ?>
							<?php } ?>
						</div>
					</div>	
					<div class="clearfix"></div>	
					
							
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;
get_footer();