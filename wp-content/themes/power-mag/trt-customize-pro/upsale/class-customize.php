<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.1.4
 */
final class Power_Mag_Customize {

	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.1.4
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.1.4
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.1.4
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/upsale/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Power_Mag_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Power_Mag_Customize_Section_Pro(
				$manager,
				'Power_Mag',
				array(
					'title'    => esc_html__( 'Power Mag Pro', 'power-mag' ),
					'pro_text' => esc_html__( 'Go Pro',         'power-mag' ),
					'pro_url'  => 'http://codetrendy.com/theme/powermag-pro',
                    'priority' => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.1.4
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'power-mag-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/upsale/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'power-mag-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/upsale/customize-controls.css' );
	}
}

// Doing this customizer thang!
Power_Mag_Customize::get_instance();