<?php
/**
 * Site Identity: Site Logo Settings
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Custom control: Range slider with number input.
 */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Aqsa_LMS_Range_Control' ) ) :

    class Aqsa_LMS_Range_Control extends WP_Customize_Control {

        public $type = 'aqsa_lms_range';

        public function render_content() {
            ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                <div class="aqsa-lms-range-wrapper" style="display:flex;align-items:center;gap:10px;">
                    <input type="range"
                        <?php $this->input_attrs(); ?>
                        <?php $this->link(); ?>
                        value="<?php echo esc_attr( $this->value() ); ?>"
                        style="flex:1;">
                    <input type="number"
                        class="aqsa-lms-range-number"
                        value="<?php echo esc_attr( $this->value() ); ?>"
                        min="<?php echo isset( $this->input_attrs['min'] ) ? esc_attr( $this->input_attrs['min'] ) : ''; ?>"
                        max="<?php echo isset( $this->input_attrs['max'] ) ? esc_attr( $this->input_attrs['max'] ) : ''; ?>"
                        step="<?php echo isset( $this->input_attrs['step'] ) ? esc_attr( $this->input_attrs['step'] ) : ''; ?>"
                        style="width:70px;text-align:center;">
                </div>
            </label>
            <script>
            (function() {
                var container = document.querySelector('.aqsa-lms-range-wrapper');
                if ( ! container ) return;
                var range = container.querySelector('input[type="range"]');
                var number = container.querySelector('.aqsa-lms-range-number');
                if ( ! range || ! number ) return;
                range.addEventListener('input', function() {
                    number.value = this.value;
                    jQuery(this).trigger('change');
                });
                number.addEventListener('input', function() {
                    range.value = this.value;
                    jQuery(range).trigger('change');
                });
            })();
            </script>
            <?php
        }
    }

endif;

/**
 * Register Site Logo customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize
 */
function aqsa_lms_site_logo_customize_register( $wp_customize ) {

    // Add custom-logo theme support (square default for site-title alignment).
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // --- Logo Width (slider + number input) ---
    $wp_customize->add_setting(
        'aqsa_lms_logo_width',
        array(
            'default'           => 80,
            'sanitize_callback' => 'absint',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        new Aqsa_LMS_Range_Control(
            $wp_customize,
            'aqsa_lms_logo_width',
            array(
                'label'       => __( 'Logo Width (px)', 'aqsa-lms' ),
                'description' => __( 'Set the width of the header logo in pixels.', 'aqsa-lms' ),
                'section'     => 'title_tagline',
                'settings'    => 'aqsa_lms_logo_width',
                'input_attrs' => array(
                    'min'  => 50,
                    'max'  => 400,
                    'step' => 10,
                ),
            )
        )
    );
}
add_action( 'customize_register', 'aqsa_lms_site_logo_customize_register' );

/**
 * Output inline CSS for custom logo width.
 */
function aqsa_lms_logo_width_css() {
    $logo_width = get_theme_mod( 'aqsa_lms_logo_width', 80 );
    if ( $logo_width && has_custom_logo() ) {
        echo '<style>.custom-logo { width: ' . esc_attr( $logo_width ) . 'px !important; height: auto !important; max-width: 100% !important; }</style>' . "\n";
    }
}
add_action( 'wp_head', 'aqsa_lms_logo_width_css' );
