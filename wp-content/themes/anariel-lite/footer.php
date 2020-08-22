<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
<!-- footer-->
<?php if(is_front_page()){ ?>
<div class="sidebars-wrap bottom">
	<div class="sidebars">
		<div class="sidebar-fullwidth">
			<?php if (is_active_sidebar('anariel-sidebar-footer-fullwidth' )) { ?>
				<?php dynamic_sidebar( 'anariel-sidebar-footer-fullwidth' ); ?>
			<?php } ?>	
		</div>		
		<div class="sidebar-left-right">
			<div class="left-sidebar">
				<?php if (is_active_sidebar('anariel-sidebar-footer-left' )) { ?>
					<?php dynamic_sidebar( 'anariel-sidebar-footer-left' ); ?>
				<?php } ?>	
			</div>
			<div class="right-sidebar">
				<?php if (is_active_sidebar('anariel-sidebar-footer-right' )) { ?>
					<?php dynamic_sidebar( 'anariel-sidebar-footer-right' ); ?>
				<?php } ?>	
			</div>
		</div>							
	</div>
</div>
<?php } ?>
<footer>
	
	<div id="footer">
	
	<?php
	if(anariel_globals('use_block3') && anariel_globals('block3_username') && function_exists( 'display_instagram' ) ){ ?>
		<div class="block3">
			<a href="<?php anariel_security(anariel_data('block3_url')) ?>" target="_blank"></a>
		</div>
		<?php
			$atts = array('id' => esc_attr(anariel_data('block3_username')), 'cols' => 6, 'imageres' => 'full', 'num' => 6);
			echo display_instagram($atts);
	}
	?>
	
	<div id="footerinside">
	<!--footer widgets-->
		<div class="block_footer_text">
			<p><?php 
			if(isset($anariel_data['block_footer_text'])){
			anariel_security($anariel_data['block_footer_text']); }?></p>
		</div>
		<div class="footer_widget">
			<div class="footer_widget1">
				<?php if (is_active_sidebar('anariel_footer1' )) { ?>
				<?php dynamic_sidebar( 'anariel_footer1' ); ?>	
				<?php } ?>				
			</div>	
			<div class="footer_widget2">	
				<?php if (is_active_sidebar('anariel_footer2' )) { ?>
				<?php dynamic_sidebar( 'anariel_footer2' ); ?>	
				<?php } ?>	
			</div>	
			<div class="footer_widget3">	
				<?php if (is_active_sidebar('anariel_footer3' )) { ?>
				<?php dynamic_sidebar( 'anariel_footer3' ); ?>	
				<?php } ?>	
			</div>
		</div>
	</div>		
	</div>
	
	
	
	
	<!-- footer bar at the bootom-->
	<div id="footerbwrap">
		<div id="footerb">
			<div class="lowerfooter">
			<div class="copyright">	
				<?php anariel_security(anariel_data('copyright')); ?>
			</div>
			</div>
		</div>
	</div>	
</footer>	
<?php wp_footer();  ?>
</body>
</html>
