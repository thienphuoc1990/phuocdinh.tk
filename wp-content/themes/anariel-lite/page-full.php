<?php
/*
Template Name: Page fullwidth
*/
?>


<?php get_header();
 ?>

<!-- main content start -->
<div class="mainwrap">
	<!--rev slider-->

	<?php $postmeta = get_post_custom(get_the_id()); 
	if(!empty($postmeta["anariel_sigle_option_revslider"][0]) && function_exists('putRevSlider')) { ?>
		<div id="anariel-slider-wrapper" class="anariel-rev-slider">
		<?php putRevSlider(esc_attr($postmeta["anariel_sigle_option_revslider_alias"][0])); ?>
		</div>
	<?php } ?>
	<div class="blogsingleimage">			
			<?php echo anariel_getImage(get_the_id(), 'anariel-postBlock'); ?>
	</div>
	<div class="main clearfix">
		
		<div class="content  singlepage">
			<div class="postcontent">
				<div class="posttext">
					<h1><?php the_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			
		</div>
		<?php comments_template(); ?>	
	</div>
</div>
<?php get_footer(); ?>