<?php 
/*
 * Blog Post ShortCode
 * Author: BootXperts
 * Author URI: http://hastech.company
 * Version: 1.0.1
 * ======================================================
 * 
/**
 * =======================================================
 *    KC Shortcode Map
 * =======================================================
 */

add_action('init', 'vorosa_blog_post'); // Call kc_add_map function ///
if(!function_exists('vorosa_blog_post')):
	function vorosa_blog_post(){

		$recent_post = array();
		$recent_post_terms = get_terms( 'category', array(
		    'hide_empty' => false,
		) );
		foreach($recent_post_terms as $recent_post_term){
			$recent_post[$recent_post_term->slug] = $recent_post_term->name;
		}
		array_push( $recent_post , 'ALL' ) ;


		if(function_exists('kc_add_map')): // if kingComposer is active
		kc_add_map(
		    array(
		        'vorosa_blog_post'  => array( // <-- shortcode tag name
		            'name'        => esc_html__('Our Blog',  'vorosa'),
		            'description' => esc_html__('Description Here',  'vorosa'),
		            'icon'        => 'fa-briefcase',
		            'category'    => 'vorosa',
		            'params'      => array(
			         	'General' => array(
			         		array(
								'name'        => 'blog_post_random_key',
								'type'        => 'random',
							),
							array(
			                    'name'        => 'category',
			                    'label'       => esc_html__('Category','vorosa'),
			                    'description' => esc_html__('Show posts associated with certain categories.','vorosa'),
			                    'type'        => 'select',
			                    'options' 	  => $recent_post, 
			                    'value' 	  => '0'
			                ),
			                array(
			                    'name'        => 'order',
			                    'label'       => esc_html__('Order By','vorosa'),
			                    'description' => esc_html__('Sort posts. ','vorosa'),
			                    'type'        => 'select',
			                    'options' => array(  // THIS FIELD REQUIRED THE PARAM OPTIONS
									'ASC' => 'Ascending',
									'DESC' => 'Descending',
								), 
			                    'value' => 'ASC'
			                ),
			                array(
								'name' => 'post_per_page',
								'label' => esc_html__( 'Post Per Page', 'vorosa' ),
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => -1,
									'max' => 100,
									'show_input' => true
								),
								'value' => '3', // remove this if you do not need a default content 
								'description' => esc_html__( 'The number of items you want to see on the screen. [ -1 for all posts. ]', 'vorosa' ),
							),
			                array(
								'name' => 'word_limit',
								'label' => esc_html__( 'Limit Words', 'vorosa' ),
								'type' => 'number_slider',  // USAGE RADIO TYPE
								'options' => array(    // REQUIRED
									'min' => 0,
									'max' => 100,
									'show_input' => true
								),
								'value' => '10', // remove this if you do not need a default content 
								'description' => esc_html__( 'Limit words you want show as short description', 'vorosa' ),
							),
							array(
								'name' 	=> 'our_blog_icon',
								'label' => esc_html__( 'Upload Icon Thumbnail', 'vorosa' ),
								'type' 	=> 'attach_image', 
								'value'	=> plugins_url( 'images/4.png', __FILE__ ),
								),
							array(
								'type'					=> 'select',
								'label'					=> esc_html__( 'Blog Icon Size', 'vorosa' ),
								'name'					=> 'blog_icon_size',
								'options'				=> array(
									'full'				=> 'Full',
									'thumbnail'			=> 'Thumbnail',
									'medium'			=> 'Medium',
									'large'				=> 'Large'
								),
							),
							array(
								'name'					=> 'show_date',
								'type'					=> 'toggle',
								'label'					=> esc_html__( 'Show Date', 'vorosa' ),
								'description' 			=> esc_html__( 'Display date of post in post items.', 'vorosa'),
								'value' 				=> 'yes'
							),
							array(
								'name'					=> 'show_title',
								'type'					=> 'toggle',
								'label'					=> esc_html__( 'Show Title', 'vorosa' ),
								'description' 			=> esc_html__('Display Title of post in post items.', 'vorosa'),
								'value' 				=> 'yes'
							),
							array(
								'name'					=> 'show_content',
								'type'					=> 'toggle',
								'label'					=> esc_html__( 'Show Content', 'vorosa' ),
								'description' 			=> esc_html__('Display Content of post in post items.', 'vorosa'),
								'value' 				=> 'no'
							),
							array(
								'name'					=> 'show_read_more',
								'type'					=> 'toggle',
								'label'					=> esc_html__( 'Show Link Button', 'vorosa' ),
								'description' 			=> esc_html__( 'Display link icon in post items.', 'vorosa' ),
								'value' 				=> 'yes'
							),
			                array(
			                    'name'        => 'custom_css_class',
			                    'label'       => esc_html__('CSS Class', 'vorosa'),
			                    'description' => esc_html__('Custom css class for css customisation', 'vorosa'),
			                    'type'        => 'text'
			                ),
			         	), // content
	                    'styling' => array(
	                    	array(
	                    		'name'   => 'custom_css',
	                    		'type'   => 'css',
	                    		'options' => array(
	                    			array(
	                    				'screens' => 'any,1024,999,767,479',
	                    				'Title'   => array(
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Title Color', 'vorosa'),
	                    					    'selector' => '+ .single-blog .vorosa-blog-title' 
	                    					),
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Title Hover Color', 'vorosa'),
	                    					    'selector' => '+ .single-blog .vorosa-blog-title a:hover' 
	                    					),
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Date Color', 'vorosa'),
	                    					    'selector' => '+ .single-blog span.vorosa-date' 
	                    					),
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Read More Color', 'vorosa'),
	                    					    'selector' => '+ .single-blog a.vorosa-read-more' 
	                    					),
	                    					array( 
	                    					    'property' => 'color', 
	                    					    'label'    => esc_html__('Read More Hover Color', 'vorosa'),
	                    					    'selector' => '+ .single-blog a.vorosa-read-more:hover' 
	                    					),
	                    					array(
	                    						'property' => 'font-family', 
	                    						'label'    => esc_html__('Font Family',  'vorosa'), 
	                    						'selector' => '+ .single-blog .vorosa-blog-title'
	                    					),
	                    					array( 
	                    						'property' => 'font-size', 
	                    						'label'    => esc_html__('Font Size', 'vorosa'),
	                    						'selector' => '+ .single-blog .vorosa-blog-title a' 
	                    					),
	                    					array( 
	                    						'property' => 'line-height', 
	                    						'label'    => esc_html__('Line Height', 'vorosa'),
	                    						'selector' => '+ .single-blog .vorosa-blog-title a' 
	                    					),
	                    					array(
	                    						'property' => 'font-weight', 
	                    						'label'    => esc_html__('Font Weight', 'vorosa'),
	                    						'selector' => '+  .single-blog .vorosa-blog-title a'
	                    					),
	                    					array(
												'property' => 'text-transform', 
												'label'    => esc_html__('Text Transform', 'vorosa'),
												'selector' => '+  .single-blog .vorosa-blog-title a'
											),
											array(
	                    						'property' => 'letter-spacing', 
	                    						'label'    => esc_html__('Letter Spacing', 'vorosa'), 
	                    						'selector' => '+ .single-blog .vorosa-blog-title a'
	                    					),
	                    					array(
	                    						'property' => 'padding', 
	                    						'label'    => esc_html__('Padding', 'vorosa'), 
	                    						'selector' => '+ .single-blog .vorosa-blog-title'
	                    					),
	                    					array(
	                    						'property' => 'margin', 
	                    						'label'    => esc_html__('Margin', 'vorosa'), 
	                    						'selector' => '+ .single-blog .vorosa-blog-title'
	                    					),
	                    				),
	                    			)
	                    		) //End of options
	                    	)
	                    ), //End of styling
                        'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						), //End of animate
		            )// Params
		        )// end shortcode key
		    )// first array
		); // End add map
		endif;
	}
endif;


 /*
 * =======================================================
 *    Register Shortcode   
 * =======================================================
 */


 if(!function_exists('vorosa_blog_post_shortcode')){
	function vorosa_blog_post_shortcode($atts,$content){
	ob_start();

		extract( $atts );

		$align_value = '';
		$custom_css = $atts['custom_css'];
		$custom_css_arr = explode('align',$custom_css);
		if(count($custom_css_arr) > 1){
			$targeted_str = $custom_css_arr[2];
			$targeted_val = str_replace('}', '', $targeted_str);
			$targeted_val = str_replace('`', '', $targeted_val);
			$targeted_val_exp = explode(':', $targeted_val);
			$align_value = end($targeted_val_exp);
		}


		$wrap_class  = apply_filters( 'kc-el-class', $atts );
		if( !empty( $custom_class ) ):
			$wrap_class[] = $custom_class;
		endif;
		$extra_class =  implode( ' ', $wrap_class );

		$custom_css_class = '';
		$recent_post = array();


	?>
	<div class="<?php echo esc_attr( $extra_class ); ?> <?php echo esc_attr( $custom_css_class ); ?>">
		
		<div class="blog__wrap blog-area blog-addon">
            <div class="row">

				<?php 

				if ('0' == $recent_post) {
					$recent_post = new WP_Query( array(
						'post_type'      			=> 'post',
		        		'order' 					=> $order,
		        		'posts_per_page'    		=>  $post_per_page, 
					));
				} else {
					$recent_post = new WP_Query( array(
						'post_type'      			=> 'post',
						'category_name' 			=> $category,
		        		'order' 					=> $order,
		        		'posts_per_page'    		=> $post_per_page, 
					));
				}
				if ( $recent_post->have_posts() ) : while ( $recent_post->have_posts() ) : $recent_post->the_post(); 
				?>
		

	                <div class="col-xs-12 col-sm-6 col-md-4 foo">
						<div class="single-blog mb-30">
							<div class="blog-img">
								<?php if(has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('vorosa_blog_img_mini'); ?></a>
								<?php endif; ?>
								<div class="blog-icon">
									<a class="blog-link" href="<?php echo esc_url( get_the_permalink() ); ?>">
										<?php echo wp_get_attachment_image($our_blog_icon, $blog_icon_size); ?>
									</a>
								</div>
							</div>
				            <?php if ('yes' == $show_date || 'yes' == $show_title || 'yes' == $show_content || 'yes' == $show_read_more): ?>
							<div class="blog-info">
								<?php if ('yes' == $show_date): ?>
									<span class="vorosa-date"> <?php echo get_the_time( get_option( 'date_format' ) ); ?></span>
								<?php endif ?>	
								<?php if ('yes' == $show_title): ?>
									<h3 class="vorosa-blog-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo get_the_title() ;?></a></h3>
								<?php endif ?>	
								<?php if ('yes' == $show_content): ?>
									<p><?php echo wp_trim_words( get_the_content(), $word_limit, '' ); ?></p>
								<?php endif ?>
								<?php if ('yes' == $show_read_more): ?>
								<a class="vorosa-read-more" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__('Read More', 'vorosa' ); ?> <i class="fa fa-angle-right"></i></a>
								<?php endif ?>
							</div>
				            <?php endif ?>
						</div>
	                </div>
	                <?php endwhile; else : ?>
					 	<p class="custom__post__not-found"><?php esc_html_e( 'Sorry, no Blog post found !', 'vorosa' ); ?></p>
					 <?php endif; ?>

				<?php wp_reset_query(); ?>

            </div>
	    </div>

	</div>
	<?php
		return ob_get_clean();
	}
	add_shortcode('vorosa_blog_post' ,'vorosa_blog_post_shortcode');
}