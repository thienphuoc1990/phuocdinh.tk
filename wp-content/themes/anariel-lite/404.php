<?php get_header(); ?>
<?php $anariel_data = get_option(OPTIONS); ?>
<!-- top bar with breadcrumb -->
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<p><?php  echo anariel_breadcrumb(); ?></p>
			</div>
		</div>
	</div>
</div> 

<!-- main content start -->			
<div id="mainwrap">
	<div id="main" class="clearfix">
		<div class="content fullwidth errorpage">
			<div class="postcontent">
				<h2><?php anariel_security($anariel_data['errorpagetitle']) ?></h2>
				<div class="posttext">
					<?php anariel_security($anariel_data['errorpage']) ?>
				</div>
				<div class="homeIcon"><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-home"></i></a></div>
			</div>							
		</div>
	</div>
</div>

<?php get_footer(); ?>