<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<!-- start -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
	
	<?php wp_head();?>
</head>		
<!-- start body -->
<body <?php body_class(); ?> >
	<!-- start header -->
			<!-- fixed menu -->		
			<?php 
			?>	
			<?php if(anariel_globals('display_scroll')) { ?>
			<div class="pagenav fixedmenu">						
				<div class="holder-fixedmenu">							
					<div class="logo-fixedmenu">								
					<?php if(anariel_globals('scroll_logo') && !anariel_globals('use_site_title')){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(anariel_data('scroll_logo')); ?>" data-rjs="3" alt="<?php esc_html(bloginfo('name')); ?> - <?php esc_html(bloginfo('description')) ?>" ></a>
					<?php } else { ?>
						<a class = "blog-name-scroll" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php } ?>
					</div>
						<div class="menu-fixedmenu home">
						<?php
						if ( has_nav_menu( 'anariel_scrollmenu' ) ) {
						wp_nav_menu( array(
						'container' =>false,
						'container_class' => 'menu-scroll',
						'theme_location' => 'anariel_scrollmenu',
						'echo' => true,
						'fallback_cb' => 'anariel_fallback_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new anariel_Walker_Main_Menu())
						);
						}
						?>	
					</div>
				</div>	
			</div>
			<?php } ?>
				<header>
				<!-- top bar -->
				<?php if(anariel_globals('top_bar')) { ?>
					<div class="top-wrapper">
						<div class="top-wrapper-content">
							<div class="top-left">
								<?php if(is_active_sidebar( 'anariel_sidebar-top-left' )) { ?>
									<?php dynamic_sidebar( 'anariel_sidebar-top-left' ); ?>
								<?php } ?>
							</div>
							<div class="top-right">
								<?php if(is_active_sidebar( 'anariel_sidebar-top-right' )) { ?>
									<?php dynamic_sidebar( 'anariel_sidebar-top-right' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>			
					<div id="headerwrap">			
						<!-- logo and main menu -->
						<div id="header">
							<div class="header-image">
							<!-- respoonsive menu main-->
							<!-- respoonsive menu no scrool bar -->
							<div class="respMenu noscroll">
								<div class="resp_menu_button"><i class="fa fa-list-ul fa-2x"></i></div>
								<?php 
								if ( has_nav_menu( 'anariel_respmenu' ) ) {
									$menuParameters =  array(
									  'theme_location' => 'anariel_respmenu', 
									  'walker'         => new anariel_Walker_Responsive_Menu(),
									  'echo'            => false,
									  'container_class' => 'menu-main-menu-container',
									  'items_wrap'     => '<div class="event-type-selector-dropdown">%3$s</div>',
									);
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>,<br>,<div>,<i>,<strong>' );
								}
								?>	
							</div>	
							<!-- logo -->
							<?php if(anariel_data('logo_position') == 1 ){ 
								anariel_logo();
							} ?>
							</div>
							<!-- main menu -->
							<div class="pagenav <?php if( anariel_data('logo_position') == 3  ){ echo 'logo-left-menu'; } ?>"> 	
							<?php if( anariel_data('logo_position') == 3  ){ 
									anariel_logo();
								} ?>								
								<div class="pmc-main-menu">
								<?php
									if ( has_nav_menu( 'anariel_mainmenu' ) ) {	
										wp_nav_menu( array(
										'container' =>false,
										'container_class' => 'menu-header home',
										'menu_id' => 'menu-main-menu-container',
										'theme_location' => 'anariel_mainmenu',
										'echo' => true,
										'fallback_cb' => 'anariel_fallback_menu',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 0,
										'walker' => new anariel_Walker_Main_Menu()));								
									} ?>											
								</div> 	
							</div> 
							<?php if(anariel_data('logo_position') == 2){ 
								anariel_logo();
							} ?>							
						</div>
					</div> 												
				</header>	
				<?php
				if(function_exists( 'putRevSlider')){						
					if(anariel_globals('use_rev_slider_home') && is_front_page() ){ ?>
						<div id="anariel-slider-wrapper">
							<div id="anariel-slider">
								<?php putRevSlider(anariel_data('rev_slider'),"homepage") ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>		
				<?php 					
				if(is_front_page() && anariel_globals('use_categories')){ ?>
						<?php anariel_block_one(); ?>
					<?php } ?>	
					<?php if(is_front_page() && anariel_globals('use_block2') ){ ?>	
						<?php anariel_block_two(); ?>
					<?php } ?>				
				<?php if(is_front_page()){ ?>
				<?php anariel_custom_layout(); ?>
				<?php } ?>				
