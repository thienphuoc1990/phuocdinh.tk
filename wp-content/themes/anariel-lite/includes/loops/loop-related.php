<?php

$post_categories = wp_get_post_categories( get_the_ID() );
$cats = array();
     
foreach($post_categories as $c){
    $cat = get_category( $c );
    $cats[] = $cat->term_id;
}
$cats = implode(",", $cats);


$args = array( 
		'category__and' => $cats,
		'posts_per_page' => 50,
		'orderby' => 'rand',
		'exclude' => array( get_the_id(),
		
		)
	);

$postslist = get_posts( $args ); 
$postmeta = get_post_custom(get_the_id());  
$anariel_fullwidth = !empty($postmeta["anariel_sigle_option_fullwidth"][0]) ? $postmeta["anariel_sigle_option_fullwidth"][0] : '';
?>

<?php if(anariel_globals('display_related') && count($postslist) > 0) { ?>



	<div class="relatedPosts <?php if(anariel_globals('use_fullwidth') || anariel_globals('singe_fullwidth') || !empty($anariel_fullwidth)) echo 'anariel_fullwidth' ?>">
		<div class="relatedtitle">
			<h4><?php  esc_html_e('Related Posts','anariel'); ?></h4>
		</div>
		<div class="related">	
		<?php
		$count = 0;
		foreach($postslist as $anariel_post) {
			$image_related = '';
			setup_postdata( $anariel_post );
			if(!has_post_format( 'quote' , $anariel_post->ID) && !has_post_format( 'link' , $anariel_post->ID)) {
			if(anariel_getImage($anariel_post->ID, 'anariel-related') !=''){
				$image_related = anariel_getImage($anariel_post->ID, 'anariel-related');
			}
			if($count != 2){ ?>
				<div class="one_third">
			<?php } else { ?>
				<div class="one_third last">
			<?php } ?>
					<?php if(!empty($image_related)){ ?>
						<div class="image"><a href="<?php echo esc_url(get_permalink($anariel_post->ID)) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','anariel')?> <?php echo esc_attr($anariel_post->post_title); ?>"><?php anariel_security($image_related) ?></a></div>
					<?php } ?>
					<h4><a href="<?php echo esc_url(get_permalink($anariel_post->ID)) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','anariel')?> <?php echo esc_attr($anariel_post->post_title); ?>"><?php echo esc_attr($anariel_post->post_title); ?></a></h4>
					<?php
					$day = get_the_time('d',$anariel_post->ID);
					$month= get_the_time('m',$anariel_post->ID);
					$year= get_the_time('Y',$anariel_post->ID);
					
					?>
					<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php echo esc_attr(date('F j, Y', strtotime($anariel_post->post_date))) ?></a>						
				</div>
					
			<?php 
			$count++;
			if($count == 3) {break;}
			}
	} ?>
		</div>
	</div>
	<?php  wp_reset_postdata(); ?>	
<?php } ?> <!-- end of related -->