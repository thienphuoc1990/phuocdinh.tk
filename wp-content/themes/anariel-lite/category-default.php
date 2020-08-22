
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!anariel_globals('use_fullwidth')) echo 'sidebar' ?> default">
	<div class="anariel-breadcrumb">
		<div class="browsing"><?php if(is_tag()){esc_attr_e('Browsing Tag','anariel');}else{esc_attr_e('Browsing Category','anariel');} ?></div>
		<?php echo anariel_breadcrumb(); ?>
	</div>
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
			
			<?php if (have_posts()) : ?>
				<?php 
				add_filter( 'shortcode_atts_gallery', 'anariel_gallery_C' );
				function anariel_gallery_c( $out )
				{
					remove_filter( current_filter(), __FUNCTION__ );
					$out['size'] = 'anariel-news';
					return $out;
				}			
				?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if(is_sticky(get_the_id())) { 
					?>
						<div class="anariel_sticky">
					<?php } ?>
					<?php $postmeta = get_post_custom(get_the_id()); 
					?>
					<?php if ( has_post_format( 'gallery' , get_the_id())) { ?>	
						<div class="slider-category anariel-type-gallery">
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
								<?php get_template_part('includes/post-formats/format-gallery','category'); ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>						
								<?php get_template_part('includes/loops/loop-blog','category'); ?>	
							</div>
						</div>				
					<?php } 
					if ( has_post_format( 'video' , get_the_id())) { ?>
						<div class="slider-category anariel-video">		
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>			
								<?php
								if(!empty($postmeta["_format_video_embed"][0])) {
									echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]));
								} ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
								<?php get_template_part('includes/loops/loop-blog','category'); ?>	
							</div>	
						</div>
					<?php } 
					
					if ( has_post_format( 'link' , get_the_id())) {
						get_template_part('includes/post-formats/format-link','category');
					} 	
					
					if ( has_post_format( 'quote' , get_the_id())) {?>
						<div class="quote-category">
							<?php get_template_part('includes/post-formats/format-quote','category'); ?>	
						</div>	
					<?php } ?>
					
					<?php if ( has_post_format( 'audio' , get_the_id())) {?>
						<div class="blogpostcategory anariel-audio">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>	
							<div class="audioPlayerWrap">
								<div class="audioPlayer">
									<?php 
									if(isset($postmeta["_format_audio_embed"][0]))
										echo wp_oembed_get(esc_url($postmeta["_format_audio_embed"][0])) ?>
								</div>
							</div>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>			
							<?php get_template_part('includes/loops/loop-blog','category'); ?>		
						</div>	
					<?php } ?>					
					
					
					<?php if ( !get_post_format() ) {?>
						<div class="blogpostcategory">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
							<?php if(anariel_getImage(get_the_id(), 'anariel-postBlock') != '') { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
								<div class="blogimage">	
									<?php if(!empty($postmeta["anariel_sigle_option_recipe"][0]) && !empty($postmeta["anariel_sigle_option_recipe_hover"][0])){ ?>
										<div class="anariel-hover-image-recipe"><?php echo anariel_recipe_hover(); ?></div>
									<?php } ?>
									<?php echo anariel_getImage(get_the_id(), 'anariel-postBlock'); ?>
								</div></a>
							<?php } ?>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
							<?php get_template_part('includes/loops/loop-blog','category'); ?>								
						</div>
					
					<?php } ?>	
					
					<?php if(is_sticky()) { ?>
						</div>
					<?php } ?>
					
				<?php endwhile; ?>
					
				<?php
					get_template_part('includes/wp-pagenavi','navigation');
					if(function_exists('anariel_wp_pagenavi')) { anariel_wp_pagenavi(); }
				?>
						
			<?php else : ?>
				<div class="postcontent error-404">
					<?php $anariel_data = get_option(OPTIONS); ?>
					<h1><?php anariel_security($anariel_data['errorpagetitle']) ?></h1>
					<div class="posttext">
						<?php anariel_security($anariel_data['errorpage']) ?>
					</div>
				</div>			
			<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!anariel_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'anariel_sidebar' )) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'anariel_sidebar' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>	
</div>											
