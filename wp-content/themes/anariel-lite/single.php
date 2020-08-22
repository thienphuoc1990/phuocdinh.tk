<?php get_header();  ?>
<!-- top bar with breadcrumb and post navigation -->
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	anariel_setPostViews(get_the_ID());
	$postmeta = get_post_custom(get_the_id());  
	$anariel_sidebar = !empty($postmeta["anariel_sigle_option_sidebar"][0]) ? $postmeta["anariel_sigle_option_sidebar"][0] : '';
	$anariel_fullwidth = !empty($postmeta["anariel_sigle_option_fullwidth"][0]) ? $postmeta["anariel_sigle_option_fullwidth"][0] : ''; ?>
	<!-- main content start -->
	<div class="mainwrap single-default <?php if(!anariel_globals('use_fullwidth') && !anariel_globals('singe_fullwidth') && empty($anariel_fullwidth)) echo 'sidebar' ?>">
		<!--rev slider-->
		<?php
		if(!empty($postmeta["anariel_sigle_option_revslider"][0]) && function_exists('putRevSlider')) { ?>
			<div id="anariel-slider-wrapper" class="anariel-rev-slider">
			<?php putRevSlider(esc_attr($postmeta["anariel_sigle_option_revslider_alias"][0])); ?>
			</div>
			<?php } ?>	
		
			<?php if(empty($postmeta["anariel_sigle_option_revslider"][0])) { ?>
				<div class="blogsingleimage">				
					<?php if ( !get_post_format() ) {?>
						<?php echo anariel_getImage(get_the_id(), 'anariel-postBlock'); ?>
					<?php } ?>
					
					<?php if ( has_post_format( 'video' , get_the_id())) {?>
						<?php  
						if(!empty($postmeta["_format_video_embed"][0])) {
							echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]));
							
						} ?>
					<?php } ?>	
					
					<?php if ( has_post_format( 'audio' , get_the_id())) {?>
						<div class="audioPlayer">
							<?php 
							if(isset($postmeta["_format_audio_embed"][0]))
								echo wp_oembed_get(esc_url($postmeta["_format_audio_embed"][0])) ?>
						</div>
					<?php } ?>	
					
					<?php if ( has_post_format( 'gallery' , get_the_id())) { ?>
							<?php get_template_part('includes/post-formats/format-gallery','single'); ?>
					<?php }  ?>	
				</div>
			<?php }  ?>	
			<div class="main clearfix">	
			<div class="content singledefult">
				<div class="postcontent singledefult" id="post-<?php  get_the_id(); ?>" <?php post_class(); ?>>		
					<div class="blogpost">				
						<div class="posttext">
							<?php get_template_part('includes/loops/loop-top-blog','single'); ?>	

							<?php if ( !has_post_format( 'quote' , get_the_id()) && !has_post_format( 'link' , get_the_id())) {?>						
								<?php get_template_part('includes/loops/loop-meta-blog','single'); ?>
							<?php } ?>
							<div class="sentry">
								<?php if ( has_post_format( 'video' , get_the_id())) {?>
									<div><?php the_content(); ?></div>
								<?php
								}
								if ( has_post_format( 'audio' , get_the_id())) { ?>
									<div><?php the_content(); ?></div>
								<?php
								}						
								if(has_post_format( 'gallery' , get_the_id())){?>
									<div class="gallery-content"><?php the_content(); 	?></div>
								<?php } 
								if ( has_post_format( 'quote' , get_the_id())) {?>
								<div class="quote-category">
									<?php get_template_part('includes/post-formats/format-quote','single'); ?>	
								</div>
								
								<?php 
								} 		
								if ( has_post_format( 'link' , get_the_id())) {
									get_template_part('includes/post-formats/format-link','single');
								} 					
								if( !get_post_format()){?> 
									<div><?php the_content(); ?></div>		
								<?php } ?>
								<div class="post-page-links"><?php wp_link_pages(); ?></div>
								<div class="singleBorder"></div>
							</div>
						</div>
						
						<?php if(anariel_globals('single_display_tags')) { ?>
							<?php if(has_tag()) { ?>
								<div class="tags"><?php the_tags('',' ',''); ?></div>	
							<?php } ?>
						<?php } ?>
						<?php if(anariel_globals('single_display_socials')) { ?>
							<div class="blog-info">
								<div class="blog_social"> <?php esc_html_e('Share: ','anariel') . anariel_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>	
							</div>
						<?php } ?>
						<?php if(anariel_globals('display_author_info') && get_the_author_meta('description')!= '') { ?>
							<div class = "author-info-wrap">
								<div class="blogAuthor">
									<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta( 'ID' ), 100); ?></a>
								</div>
								<div class="authorBlogName">	
									<?php esc_html_e('Written by ','anariel'); ?> <?php echo get_the_author(); ?>  
								</div>
								<div class = "bibliographical-info"><?php echo get_the_author_meta('description')?></div>
							</div>
						<?php } ?> <!-- end of author info -->
						
					</div>						
					
				</div>	
				
				<?php get_template_part('includes/loops/loop-related','single'); ?>	
				
				
				<?php comments_template(); ?>
				
				<?php if(anariel_globals('single_display_post_navigation')) { ?>
				<div class = "post-navigation">
					<?php next_post_link('%link', '<div class="link-title-previous"><span>&#171; '.esc_html__('Previous post','anariel').'</span><div class="prev-post-title">%title</div></div>' ,false,''); ?> 
					<?php previous_post_link('%link','<div class="link-title-next"><span>'.esc_html__('Next post','anariel').' &#187;</span><div class="next-post-title">%title</div></div>',false,''); ?> 
				</div>
				<?php } ?> <!-- end of post navigation -->
				
				<?php endwhile; else: ?>
								
					<?php get_template_part('404','error-page'); ?>
				
			<?php endif; ?>	
			</div>
				
			<?php if(!anariel_globals('use_fullwidth') && !anariel_globals('singe_fullwidth') && empty($anariel_fullwidth)) { ?>
				<?php if(is_active_sidebar( 'anariel_sidebar' ) || is_active_sidebar( 'anariel-sidebar-single' )) { ?>
					<div class="sidebar">	
						<?php if(anariel_globals('singe_sidebar') || !empty($anariel_sidebar)) { 
							dynamic_sidebar( 'anariel-sidebar-single' ); 
						} else {
							dynamic_sidebar( 'anariel_sidebar' ); 
						}
						?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>
