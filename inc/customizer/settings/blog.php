<?php
/**
 * Blog Customizer Options
 *
 * @package Ocean WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'OceanWP_Blog_Customizer' ) ) :

	class OceanWP_Blog_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', 	array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 1.0.0
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Panel
			 */
			$panel = 'ocean_blog';
			$wp_customize->add_panel( $panel , array(
				'title' 			=> esc_html__( 'Blog', 'oceanwp' ),
				'priority' 			=> 210,
			) );

			/**
			 * Section
			 */
			$wp_customize->add_section( 'ocean_blog_entries', array(
				'title' 			=> esc_html__( 'Blog Entries', 'oceanwp' ),
				'priority' 			=> 10,
				'panel' 			=> $panel,
			) );

			/**
			 * Archives & Entries Layout
			 */
			$wp_customize->add_setting( 'ocean_blog_archives_layout', array(
				'default'           	=> 'right-sidebar',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Radio_Image_Control( $wp_customize, 'ocean_blog_archives_layout', array(
				'label'	   				=> esc_html__( 'Archives & Entries Layout', 'oceanwp' ),
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_archives_layout',
				'priority' 				=> 10,
				'choices' 				=> array(
					'right-sidebar'  	=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/2cr.png',
					'left-sidebar' 		=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/2cl.png',
					'full-width'  		=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/1c.png',
				),
			) ) );

			/**
			 * Blog Style
			 */
			$wp_customize->add_setting( 'ocean_blog_style', array(
				'default'           	=> 'large-entry',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_style', array(
				'label'	   				=> esc_html__( 'Blog Style', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_style',
				'priority' 				=> 10,
				'choices' 				=> array(
					'large-entry'  		=> esc_html__( 'Large Image', 'oceanwp' ),
					'grid-entry' 		=> esc_html__( 'Grid', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Grid Images Size
			 */
			$wp_customize->add_setting( 'ocean_blog_grid_images_size', array(
				'default'           	=> 'medium',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_grid_images_size', array(
				'label'	   				=> esc_html__( 'Images Size', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_grid_images_size',
				'priority' 				=> 10,
				'active_callback' 		=> 'oceanwp_cac_grid_blog_style',
				'choices' 				=> array(
					'thumbnail' 		=> esc_html__( 'Thumbnail', 'oceanwp' ),
					'medium' 			=> esc_html__( 'Medium', 'oceanwp' ),
					'medium_large' 		=> esc_html__( 'Medium Large', 'oceanwp' ),
					'large' 			=> esc_html__( 'Large', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Grid Columns
			 */
			$wp_customize->add_setting( 'ocean_blog_grid_columns', array(
				'default'           	=> '2',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_grid_columns', array(
				'label'	   				=> esc_html__( 'Grid Columns', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_grid_columns',
				'priority' 				=> 10,
				'active_callback' 		=> 'oceanwp_cac_grid_blog_style',
				'choices' 				=> array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
			) ) );

			/**
			 * Blog Grid Style
			 */
			$wp_customize->add_setting( 'ocean_blog_grid_style', array(
				'default'           	=> 'fit-rows',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_grid_style', array(
				'label'	   				=> esc_html__( 'Grid Style', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_grid_style',
				'priority' 				=> 10,
				'active_callback' 		=> 'oceanwp_cac_grid_blog_style',
				'choices' 				=> array(
					'fit-rows' 			=> esc_html__( 'Fit Rows', 'oceanwp' ),
					'masonry' 			=> esc_html__( 'Masonry', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Grid Equal Heights
			 */
			$wp_customize->add_setting( 'ocean_blog_grid_equal_heights', array(
				'default'           	=> false,
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_grid_equal_heights', array(
				'label'	   				=> esc_html__( 'Equal Heights', 'oceanwp' ),
				'type' 					=> 'checkbox',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_grid_equal_heights',
				'priority' 				=> 10,
				'active_callback' 		=> 'oceanwp_cac_blog_supports_equal_heights',
			) ) );

			/**
			 * Blog Pagination Style
			 */
			$wp_customize->add_setting( 'ocean_blog_pagination_style', array(
				'default'           	=> 'standard',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ocean_blog_pagination_style', array(
				'label'	   				=> esc_html__( 'Blog Pagination Style', 'oceanwp' ),
				'type' 					=> 'select',
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_pagination_style',
				'priority' 				=> 10,
				'choices' 				=> array(
					'standard' 			=> esc_html__( 'Standard', 'oceanwp' ),
					'infinite_scroll' 	=> esc_html__( 'Infinite Scroll', 'oceanwp' ),
					'next_prev' 		=> esc_html__( 'Next/Prev', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Entries Elements Positioning
			 */
			$wp_customize->add_setting( 'ocean_blog_entry_elements_positioning', array(
				'default'           	=> array( 'featured_image', 'title', 'meta', 'content', 'read_more' ),
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Sortable_Control( $wp_customize, 'ocean_blog_entry_elements_positioning', array(
				'label'	   				=> esc_html__( 'Elements Positioning', 'oceanwp' ),
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_entry_elements_positioning',
				'priority' 				=> 10,
				'choices' 				=> array(
					'featured_image'    => esc_html__( 'Featured Image', 'oceanwp' ),
					'title'       		=> esc_html__( 'Title', 'oceanwp' ),
					'meta' 				=> esc_html__( 'Meta', 'oceanwp' ),
					'content' 			=> esc_html__( 'Content', 'oceanwp' ),
					'read_more'   		=> esc_html__( 'Read More', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Entries Meta
			 */
			$wp_customize->add_setting( 'ocean_blog_entry_meta', array(
				'default'           	=> array( 'author', 'date', 'categories', 'comments' ),
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Sortable_Control( $wp_customize, 'ocean_blog_entry_meta', array(
				'label'	   				=> esc_html__( 'Meta', 'oceanwp' ),
				'section'  				=> 'ocean_blog_entries',
				'settings' 				=> 'ocean_blog_entry_meta',
				'priority' 				=> 10,
				'choices' 				=> array(
					'author'     		=> esc_html__( 'Author', 'oceanwp' ),
					'date'       		=> esc_html__( 'Date', 'oceanwp' ),
					'categories' 		=> esc_html__( 'Categories', 'oceanwp' ),
					'comments'   		=> esc_html__( 'Comments', 'oceanwp' ),
				),
			) ) );

			/**
			 * Section
			 */
			$wp_customize->add_section( 'ocean_single_post', array(
				'title' 			=> esc_html__( 'Single Post', 'oceanwp' ),
				'priority' 			=> 10,
				'panel' 			=> $panel,
			) );

			/**
			 * Single Layout
			 */
			$wp_customize->add_setting( 'ocean_blog_single_layout', array(
				'default'           	=> 'right-sidebar',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Radio_Image_Control( $wp_customize, 'ocean_blog_single_layout', array(
				'label'	   				=> esc_html__( 'Layout', 'oceanwp' ),
				'section'  				=> 'ocean_single_post',
				'settings' 				=> 'ocean_blog_single_layout',
				'priority' 				=> 10,
				'choices' 				=> array(
					'right-sidebar'  	=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/2cr.png',
					'left-sidebar' 		=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/2cl.png',
					'full-width'  		=> OCEANWP_INC_DIR_URI . 'customizer/assets/img/1c.png',
				),
			) ) );

			/**
			 * Blog Single Elements Positioning
			 */
			$wp_customize->add_setting( 'ocean_blog_single_elements_positioning', array(
				'default' 				=> array( 'featured_image', 'title', 'meta', 'content', 'tags', 'social_share', 'next_prev', 'author_box', 'related_posts', 'single_comments' ),
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Sortable_Control( $wp_customize, 'ocean_blog_single_elements_positioning', array(
				'label'	   				=> esc_html__( 'Elements Positioning', 'oceanwp' ),
				'section'  				=> 'ocean_single_post',
				'settings' 				=> 'ocean_blog_single_elements_positioning',
				'priority' 				=> 10,
				'choices' 				=> array(
					'featured_image'    => esc_html__( 'Featured Image', 'oceanwp' ),
					'title'       		=> esc_html__( 'Title', 'oceanwp' ),
					'meta' 				=> esc_html__( 'Meta', 'oceanwp' ),
					'content' 			=> esc_html__( 'Content', 'oceanwp' ),
					'tags' 				=> esc_html__( 'Tags', 'oceanwp' ),
					'social_share'   	=> esc_html__( 'Social Share', 'oceanwp' ),
					'next_prev'     	=> esc_html__( 'Next/Prev Links', 'oceanwp' ),
					'author_box'       	=> esc_html__( 'Author Box', 'oceanwp' ),
					'related_posts' 	=> esc_html__( 'Related Posts', 'oceanwp' ),
					'single_comments'   => esc_html__( 'Comments', 'oceanwp' ),
				),
			) ) );

			/**
			 * Blog Single Meta
			 */
			$wp_customize->add_setting( 'ocean_blog_single_meta', array(
				'default'           	=> array( 'author', 'date', 'categories', 'comments' ),
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Sortable_Control( $wp_customize, 'ocean_blog_single_meta', array(
				'label'	   				=> esc_html__( 'Meta', 'oceanwp' ),
				'section'  				=> 'ocean_single_post',
				'settings' 				=> 'ocean_blog_single_meta',
				'priority' 				=> 10,
				'choices' 				=> array(
					'author'     		=> esc_html__( 'Author', 'oceanwp' ),
					'date'       		=> esc_html__( 'Date', 'oceanwp' ),
					'categories' 		=> esc_html__( 'Categories', 'oceanwp' ),
					'comments'   		=> esc_html__( 'Comments', 'oceanwp' ),
				),
			) ) );

			/**
			 * Related Posts Count
			 */
			$wp_customize->add_setting( 'ocean_blog_related_count', array(
				'default' 				=> '3',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Range_Control( $wp_customize, 'ocean_blog_related_count', array(
				'label'	   				=> esc_html__( 'Related Posts Count', 'oceanwp' ),
				'section'  				=> 'ocean_single_post',
				'settings' 				=> 'ocean_blog_related_count',
				'priority' 				=> 10,
			    'input_attrs' 			=> array(
			        'min'   => 2,
			        'max'   => 12,
			        'step'  => 1,
			    ),
			) ) );

			/**
			 * Related Posts Columns
			 */
			$wp_customize->add_setting( 'ocean_blog_related_columns', array(
				'default' 				=> '3',
				'sanitize_callback' 	=> false,
			) );

			$wp_customize->add_control( new OceanWP_Customizer_Range_Control( $wp_customize, 'ocean_blog_related_columns', array(
				'label'	   				=> esc_html__( 'Related Posts Columns', 'oceanwp' ),
				'section'  				=> 'ocean_single_post',
				'settings' 				=> 'ocean_blog_related_columns',
				'priority' 				=> 10,
			    'input_attrs' 			=> array(
			        'min'   => 1,
			        'max'   => 6,
			        'step'  => 1,
			    ),
			) ) );

		}

	}

endif;

return new OceanWP_Blog_Customizer();