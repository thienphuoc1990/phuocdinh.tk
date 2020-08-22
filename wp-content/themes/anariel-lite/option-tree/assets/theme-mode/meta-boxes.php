<?php
/**
 * Initialize the anariel Meta Boxes. 
 */
add_action( 'admin_init', 'anariel_meta_boxes' );

/**
 * Meta Boxes anariel code.
 *
 * You can find all the available option types in anariel-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function anariel_meta_boxes() {
  
  /**
   * Create a anariel meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */

  $anariel_meta_box_post = array(
    'id'          => 'anariel_meta_box',
    'title'       => esc_html__( 'Anariel Options', 'anariel' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Anariel post options', 'anariel' ),
        'id'          => 'anariel_post_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Set the fullwidth layout for this post.', 'anariel' ),
        'id'          => 'anariel_sigle_option_fullwidth',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will have the fullwidth layout.','anariel'),
        'std'         => ''
      ),
      array(
        'label'       => esc_html__( 'Use different sidebar for the single post?', 'anariel' ),
        'id'          => 'anariel_sigle_option_sidebar',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will use different sidebar ("Sidebar for single blog posts").','anariel'),
        'std'         => '',
        'condition'   => 'anariel_sigle_option_fullwidth:is()',
        'operator'    => 'and',				
		),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of thr featured image?', 'anariel' ),
        'id'          => 'anariel_sigle_option_revslider',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this post will use Revolution Slider instead of the feautured image.','anariel'),
        'std'         => '',	
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'anariel' ),
        'id'          => 'anariel_sigle_option_revslider_alias',
        'type'        => 'revslider_select',
        'desc'        => esc_html__('If set to ON this you will use Revolution Slider instead of the feautured image.','anariel'),
        'std'         => '',	
        'condition'   => 'anariel_sigle_option_revslider:is(1)',
        'operator'    => 'and',				
      ),	  
    )
  );
  
  $anariel_meta_box_page = array(
    'id'          => 'anariel_meta_box',
    'title'       => esc_html__( 'Anariel Options', 'anariel' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Anariel page options', 'anariel' ),
        'id'          => 'anariel_pafe_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'anariel' ),
        'id'          => 'anariel_sigle_option_revslider',
        'type'        => 'on-off',
        'desc'        => esc_html__('If set to ON this page will use Revolution Slider instead of feautured image.','anariel'),
        'std'         => '',	
      ),
      array(
        'label'       => esc_html__( 'Use Revolution slider instead of featured image?', 'anariel' ),
        'id'          => 'anariel_sigle_option_revslider_alias',
        'type'        => 'revslider_select',
        'desc'        => esc_html__('If set to ON this pyou will use Revolution Slider instead of feautured image.','anariel'),
        'std'         => '',	
        'condition'   => 'anariel_sigle_option_revslider:is(1)',
        'operator'    => 'and',				
      ),	  
    )
  );  
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) ){
    ot_register_meta_box( $anariel_meta_box_post );
	ot_register_meta_box( $anariel_meta_box_page );
	}

}