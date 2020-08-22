<?php if(!is_single()) { ?>
	<div class="topBlog">	
		<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '&#8226;', 'anariel' ) ) . '</em>'; ?> </div>
		<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','anariel'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	</div>		
<?php } else { ?>
	<div class="topBlog">	
		<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( '&#8226;', 'anariel' ) ) . '</em>'; ?> </div>
		<h1 class="title"> <?php the_title(); ?></h1>
	</div>			
<?php } ?>