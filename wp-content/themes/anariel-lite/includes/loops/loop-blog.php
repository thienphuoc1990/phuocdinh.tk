<?php $postmeta = get_post_custom(get_the_id());   ?>
<div class="entry">
	<div class = "meta">		
		<div class="blogContent">
			<div class="blogcontent"><?php the_content() ?></div>
		
			<div class="bottomBlog">
		
				<?php if(anariel_globals('display_socials')) { ?>
				
				<div class="blog_social"> <?php esc_html_e('Share: ','anariel') . anariel_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
				<?php } ?>
				 <!-- end of socials -->
				
				<?php if(anariel_globals('display_reading')) { ?>
				<div class="blog_time_read">
					<?php if(empty($postmeta["anariel_sigle_option_recipe"][0]) || !isset($postmeta["anariel_sigle_option_recipe"][0])){ ?>
						<?php echo esc_html__('Reading time: ','anariel') . esc_attr(anariel_estimated_reading_time(get_the_ID())) . esc_html__(' min','anariel') ; ?>
					<?php } else { ?>
						<?php echo esc_html__('Cooking time: ','anariel') . esc_attr(anariel_recipe('wprm_total_time')) . esc_html__(' min','anariel') ; ?>
					<?php } ?>
				</div>
				<?php } ?>
				<!-- end of reading -->
			</div> 
		</div>
	</div>		
</div>
