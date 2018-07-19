<?php

class ETL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'etl_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'divi',
		'author'     => 'divi',
		'author_uri' => 'Jay',
	);
    public function get_advanced_fields_config()
    {
        return array(
            'background' => array(
                'css' => array(
                    'main' => '%%order_class%% .front'
                ),
            ),
            'fonts' => array(

                'header' => array(
                    'css'          => array(
                        'main'      => "%%order_class%% .front h2, %%order_class%% .front h1, %%order_class%% .front h3, %%order_class%% .front h4, %%order_class%% .front h5, %%order_class%% .front h6",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),
                    'label'        => esc_html__( 'Title Front', 'simp-simple' ),
                ),
                'body' => array(
                    'css'          => array(
                        'main'      => "%%order_class%% .content",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),
                    'label'        => esc_html__( 'Content Front', 'simp-simple' ),
                ),
                'header_back' => array(
                    'css'       => array(
                        'main'      => "%%order_class%% .back h2, %%order_class%% .back h1, %%order_class%% .back h3, %%order_class%% .back h4, %%order_class%% .back h5, %%order_class%% .back h6",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2'
                    ),
                    'label'        => esc_html__( 'Title Back', 'simp-simple' ),
                ),
                'body_back' => array(
                    'css'          => array(
                        'main'      => "%%order_class%% .content-back",
                        'important' => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),
                    'label'        => esc_html__( 'Content Back', 'simp-simple' ),
                ),
            ),
            'button' => array(
                'button' => array(
                    'box_shadow'    => array(
                        'css' => array(
                            'main' => "%%order_class%% .et_pb_button",
                        ),
                    ),
                    'css'           => array(
                        'plugin_main' => "%%order_class .et_pb_button",
                        'alignment'   => "%%order_class%% .et_pb_button_wrapper",
                    ),
                    'label'         => esc_html__( 'Button', 'simp-simple' ),
                    'use_alignment' => true,
                    'tab_slug'      => 'back'
                ),
            ),
        );


    }
	public function init() {
		$this->name = esc_html__( 'Flip Module', 'etl-divilocal' );
        $this->settings_modal_toggles  = array(
            // Content tab's slug is "general"
            'general'  => array(
                'toggles' => array(
                    'main_content' => esc_html__( 'Text', 'dicm-divi-custom-modules' ),
                    'image' => esc_html__( 'Image', 'dicm-divi-custom-modules' ),
                ),
            ),
            'advanced'  => array(
                'toggles'   => array(
                    'icon_settings' => esc_html__('Icon Settings', 'etl_divilocal'),
                    'icon_back_settings' => esc_html__('Icon Back Settings', 'etl_divilocal')
                    ),
            ),
            'back' => array(
                'toggles' => array(
                    'input'      => esc_html( 'Back Fields', 'dicm-divi-custom-modules' ),
                    'image'      => esc_html('Back Image', 'etl_divilocal')
                ),
            ),
        );
	}

	public function get_fields() {
		return array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'etl-divilocal' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
				'toggle_slug'     => 'main_content',
			),

            'use_icon' => array(
                'label'           => esc_html__( 'Use Icon', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'toggle_slug'     => 'image',
                'affects'         => array(
                    'border_radii_image',
                    'border_styles_image',
                    'box_shadow_style_image',
                    'font_icon',
                    'image_max_width',
                    'use_icon_font_size',
                    'use_circle',
                    'icon_color',
                    'image',
                    'alt',
                    'child_filter_hue_rotate',
                    'child_filter_saturate',
                    'child_filter_brightness',
                    'child_filter_contrast',
                    'child_filter_invert',
                    'child_filter_sepia',
                    'child_filter_opacity',
                    'child_filter_blur',
                    'child_mix_blend_mode',
                ),
                'description' => esc_html__( 'Here you can choose whether icon set below should be used.', 'et_builder' ),
                'default_on_front'=> 'off',
            ),
            'use_icon_back' => array(
                'label'           => esc_html__( 'Use Icon', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'image',
                'affects'         => array(

                    'font_icon_back',
                    'use_icon_font_size_back',
                    'use_circle_back',
                    'icon_color_back',
                    'image_back',

                ),
                'description' => esc_html__( 'Here you can choose whether icon set below should be used.', 'et_builder' ),
                'default_on_front'=> 'off',
            ),
            'font_icon' => array(
                'label'               => esc_html__( 'Icon', 'et_builder' ),
                'type'                => 'select_icon',
                'option_category'     => 'basic_option',
                'class'               => array( 'et-pb-font-icon' ),
                'toggle_slug'         => 'image',
                'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'et_builder' ),
                'depends_show_if'     => 'on',
            ),
            'font_icon_back' => array(
                'label'               => esc_html__( 'Icon', 'et_builder' ),
                'type'                => 'select_icon',
                'option_category'     => 'basic_option',
                'class'               => array( 'et-pb-font-icon' ),
                'tab_slug'            => 'back',
                'toggle_slug'         => 'image',
                'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'et_builder' ),
                'depends_show_if'     => 'on',
            ),
            'icon_color' => array(
                'default'           => 'white',
                'label'             => esc_html__( 'Icon Color', 'et_builder' ),
                'type'              => 'color-alpha',
                'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'et_builder' ),
                'depends_show_if'   => 'on',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'icon_settings',
            ),
            'icon_color_back' => array(
                'default'           => 'white',
                'label'             => esc_html__( 'Icon Color', 'et_builder' ),
                'type'              => 'color-alpha',
                'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'et_builder' ),
                'depends_show_if'   => 'on',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'icon_back_settings',
            ),
            'use_circle' => array(
                'label'           => esc_html__( 'Circle Icon', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'affects'           => array(
                    'use_circle_border',
                    'circle_color',
                ),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'icon_settings',
                'description'      => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'et_builder' ),
                'depends_show_if'  => 'on',
                'default_on_front'=> 'off',
            ),
            'use_circle_back' => array(
                'label'           => esc_html__( 'Circle Icon', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'affects'           => array(
                    'use_circle_border_back',
                    'circle_color_back',
                ),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'icon_back_settings',
                'description'      => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'et_builder' ),
                'depends_show_if'  => 'on',
                'default_on_front'=> 'off',
            ),
            'circle_color' => array(
                'default'         => 'white',
                'label'           => esc_html__( 'Circle Color', 'et_builder' ),
                'type'            => 'color-alpha',
                'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'et_builder' ),
                'depends_show_if' => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'icon_settings',
            ),
            'circle_color_back' => array(
                'default'         => 'white',
                'label'           => esc_html__( 'Circle Color', 'et_builder' ),
                'type'            => 'color-alpha',
                'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'et_builder' ),
                'depends_show_if' => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'icon_back_settings',
            ),
            'use_circle_border' => array(
                'label'           => esc_html__( 'Show Circle Border', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'affects'           => array(
                    'circle_border_color',
                ),
                'description' => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'et_builder' ),
                'depends_show_if'   => 'on',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'icon_settings',
                'default_on_front'  => 'off',
            ),
            'use_circle_border_back' => array(
                'label'           => esc_html__( 'Show Circle Border', 'et_builder' ),
                'type'            => 'yes_no_button',
                'option_category' => 'layout',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'affects'           => array(
                    'circle_border_color_back',
                ),
                'description' => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'et_builder' ),
                'depends_show_if'   => 'on',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'icon_back_settings',
                'default_on_front'  => 'off',
            ),

            'circle_border_color' => array(
                'default'         => 'white',
                'label'           => esc_html__( 'Circle Border Color', 'et_builder' ),
                'type'            => 'color-alpha',
                'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'et_builder' ),
                'depends_show_if' => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'icon_settings',
            ),
            'circle_border_color_back' => array(
                'default'         => 'white',
                'label'           => esc_html__( 'Circle Border Color', 'et_builder' ),
                'type'            => 'color-alpha',
                'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'et_builder' ),
                'depends_show_if' => 'on',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'icon_back_settings',
            ),
            'image_back' => array(
                'label'              => esc_html__( 'Image', 'et_builder' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
                'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'et_builder' ),
                'tab_slug'           => 'back',
                'toggle_slug'        => 'image',
            ),
            'image' => array(
                'label'              => esc_html__( 'Image', 'et_builder' ),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
                'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
                'depends_show_if'    => 'off',
                'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'et_builder' ),
                'toggle_slug'        => 'image',
            ),


            'content' => array(
                'label'           => esc_html__( 'Content Front', 'etl-divilocal' ),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),
            'height' => array(
                'label'           => esc_html__( 'height', 'etl-divilocal' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
                'toggle_slug'     => 'main_content',
            ),
            'button_text' => array(
                'label'           => esc_html__( 'Button Text', 'dicm-divi-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input your desired button text, or leave blank for no button.', 'dicm-divi-custom-modules' ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'button',
            ),
            'button_url' => array(
                'label'           => esc_html__( 'Button URL', 'dicm-divi-custom-modules' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Input URL for your button.', 'dicm-divi-custom-modules' ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'button',
            ),
            'button_url_new_window' => array(
                'default'         => 'off',
                'default_on_front'=> true,
                'label'           => esc_html__( 'Url Opens', 'dicm-divi-custom-modules' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__( 'In The Same Window', 'dicm-divi-custom-modules' ),
                    'on'  => esc_html__( 'In The New Tab', 'dicm-divi-custom-modules' ),
                ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'button',
                'description'     => esc_html__( 'Choose whether your link opens in a new window or not', 'dicm-divi-custom-modules' ),
            ),
            'back_title' => array(
                'label'           => esc_html__( 'Back Title', 'etl-divilocal' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'input',
            ),
            'content_back' => array(
                'label'           => esc_html__( 'Content Back', 'etl-divilocal' ),
                'type'            => 'textarea',
                'option_category' => 'basic_option',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'input',
            ),
            'background_image_back' => array(
                'label'              => esc_html__( 'Background Image', 'et_builder' ),
                'type'               => 'upload',
                'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
                'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
                'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
                'tab_slug'           => 'back',
                'toggle_slug'        => 'input',
                'depends_show_if'     => 'on'
            ),
            'background_color_back' => array(
                'label'              => esc_html__( 'Background Color', 'et_builder' ),
                'type'               => 'color',

                'choose_text'        => esc_attr__( 'Choose an Color', 'et_builder' ),
                'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
                'tab_slug'           => 'back',
                'toggle_slug'        => 'input',
                'depends_show_if'     => 'off'
            ),
            'use_background_image_back' => array(
                'label'           => esc_html__( 'Use Backround Image', 'etl-divilocal' ),
                'type'            => 'yes_no_button',
                'option_category' => 'basic_option',
                'options'         => array(
                    'off' => esc_html__( 'No', 'et_builder' ),
                    'on'  => esc_html__( 'Yes', 'et_builder' ),
                ),
                'affects'           => array(
                    'background_image_back',
                    'background_color_back',
                ),
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'etl-divilocal' ),
                'tab_slug'        => 'back',
                'toggle_slug'     => 'input',
            ),
        );
	}

	function background_style(){
        $background_style_string = '';
        if ('on' == $this->props['use_background_image']){
            $background_style_string = $this->props['background_image_back'];
        }
        else{
            $background_style_string = $this->props['background_color_back'];
        }
        return $background_style_string;
    }

	public function render( $attrs, $content = null, $render_slug ) {
        $button_text = $this->props['button_text'];
        $button_url = $this->props['button_url'];
        $button_url_new_window = $this->props['button_url_new_window'];
        // These design related props are added via $this->advanced_options['button']['button']
        $button_custom         = $this->props['custom_button'];
        $button_rel            = $this->props['button_rel'];
        $button_use_icon       = $this->props['button_use_icon'];
        $header_back_level = $this->props['header_back_level'] ? $this->props['header_back_level'] : 'h2';
        $header_level = $this->props['header_level'] ? $this->props['header_level'] : 'h2';
        $test = $this->props;
        $image = $this->props['image'];
        $image_back = $this->props['image_back'];
        $icon_color = $this->props['icon_color'];
        $icon_color_back = $this->props['icon_color_back'];
        $use_icon_back = $this->props['use_icon_back'];
        $use_circle = $this->props['use_circle'];
        $use_circle_back = $this->props['use_circle_back'];
        $circle_color = $this->props['circle_color'];
        $circle_color_back = $this->props['circle_color_back'];
        $circle_border_color = $this->props['circle_border_color'];
        $circle_border_color_back = $this->props['circle_border_color_back'];
        $use_circle_border = $this->props['use_circle_border'];
        $use_circle_border_back = $this->props['use_circle_border_back'];
        $use_icon = $this->props['use_icon'];
        $font_icon = $this->props['font_icon'];
        $font_icon_back = $this->prop['font_icon_back'];
        $font_icon_back = $this->props['font_icon_back'];
	    $title = $this->props['title'];
	    $back_title = $this->props['back_title'];
        $button = $this->render_button( array(
            'button_text'      => $button_text,
            'button_url'       => $button_url,
            'url_new_window'   => $button_url_new_window,
            'button_custom'    => $button_custom,
            'button_rel'       => $button_rel,
            'custom_icon'      => $button_use_icon,
        ) );
        if ( 'off' !== $this->props['use_background_image_back']) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .back',
                'declaration' => sprintf(
                    'background-image: url(%1$s);',
                    $this->props['background_image_back']
                ),
            ) );
        }
        if('on' !== $this->props['use_background_image_back']){
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .back',
                'declaration' => sprintf(
                    'background: %1$s;',
                    $this->props['background_color_back']
                ),
            ) );
        }
        if ( '' !== $this->props['height'] ) {
            ET_Builder_Element::set_style( $render_slug, array(
                'selector'    => '%%order_class%% .flipper',
                'declaration' => sprintf(
                    'height: %1$s;',
                    $this->props['height']
                ),
            ) );
        }
        if ( 'off' === $use_icon ) {
            $image = ( '' !== trim( $image ) ) ? sprintf(
                '<img class="front-image" src="%1$s"  />',
                esc_attr( $image )): '';
        } else {
            $icon_style = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );

            if ( 'on' === $use_circle ) {
                $icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color ) );

                if ( 'on' === $use_circle_border ) {
                    $icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color ) );
                }
            }

            $image = ( '' !== $font_icon ) ? sprintf(
                '<span class="et-pb-icon%3$s%4$s" style="%5$s">%1$s</span>',
                esc_attr( et_pb_process_font_icon( $font_icon ) ),
                esc_attr( " et_pb_animation_{$animation}" ),
                ( 'on' === $use_circle ? ' et-pb-icon-circle' : '' ),
                ( 'on' === $use_circle && 'on' === $use_circle_border ? ' et-pb-icon-circle-border' : '' ),
                $icon_style
            ) : '';
        }
        if ( 'off' === $use_icon_back ) {
            $image_back = ( '' !== trim( $image_back ) ) ? sprintf(
                '<img class="front-image" src="%1$s"  />',
                esc_attr( $image_back )): '';
        } else {
            $icon_style_back = sprintf( 'color: %1$s;', esc_attr( $icon_color_back ) );

            if ( 'on' === $use_circle_back ) {
                $icon_style_back .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color_back ) );

                if ( 'on' === $use_circle_border ) {
                    $icon_style_back .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color_back ) );
                }
            }

            $image_back = ( '' !== $font_icon ) ? sprintf(
                '<span class="et-pb-icon%3$s%4$s" style="%5$s">%1$s</span>',
                esc_attr( et_pb_process_font_icon( $font_icon_back ) ),
                esc_attr( " et_pb_animation_{$animation}" ),
                ( 'on' === $use_circle_back ? ' et-pb-icon-circle' : '' ),
                ( 'on' === $use_circle_back && 'on' === $use_circle_border_back ? ' et-pb-icon-circle-border' : '' ),
                $icon_style_back
            ) : '';
        }
	    return sprintf( '
                                    <div class="flipper">
                                        <div class="front">
                                            %1$s
                                            <div class="front-text">
                                                <%2$s class="title">%3$s</%2$s>
                                                <div class="content">%3$s</div>
                                            </div>
                                         </div>
                                         <div class="back">
                                            %8$s
                                            <div class="back-text">
                                                <%5$s class="title-back">%6$s</%5$s>
                                                <div class="content-back">
                                                    %7$s
                                                </div>
                                            </div>
                                            %9$s
                                         </div>
                                      </div>
                                    
                               ', $image,$header_level,$title, $this->props['content'],$header_back_level,$back_title,trim($this->props['content_back']), $image_back, $button );
	}
}

new ETL_HelloWorld;
 