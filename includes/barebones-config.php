<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	load_theme_textdomain('borntogive', BORNTOGIVE_FILEPATH . '/language');
    // This is your option name where all the Redux data is stored.
    $opt_name = "borntogive_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'borntogive' ),
        'page_title'           => esc_html__( 'Theme Options', 'borntogive' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 57,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/imithemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/imithemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'borntogive' ), $v );
    } else {
        //$args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'borntogive' );
    }

    // Add content after the form.
    //$args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'borntogive' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    /*$tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'borntogive' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'borntogive' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'borntogive' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'borntogive' )
        )
    );*/
    //Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'borntogive' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
			load_theme_textdomain('borntogive', BORNTOGIVE_FILEPATH . '/language');
			$defaultAdminLogo = get_template_directory_uri().'/images/logo-admin.png';
			$logo_sticky = get_template_directory_uri().'/images/sticky-logo.png';
			$retina_logo_sticky = get_template_directory_uri() . '/images/sticky-logo@2x.png';
			$defaultBannerImages = get_template_directory_uri().'/images/page-header.png';
			$default_logo = get_template_directory_uri() . '/images/logo.png';
			$default_retina_logo = get_template_directory_uri() . '/images/logo@2x.png';
			$default_favicon = get_template_directory_uri() . '/images/favicon.ico';
			$default_iphone = get_template_directory_uri() . '/images/apple-iphone.png';
			$default_iphone_retina = get_template_directory_uri() . '/images/apple-iphone-retina.png';
			$default_ipad = get_template_directory_uri() . '/images/apple-ipad.png';
			$default_ipad_retina = get_template_directory_uri() . '/images/apple-ipad-retina.png';
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => esc_html__('General', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'enable_maintenance',
            'type' => 'switch',
            'title' => esc_html__('Enable Maintenance', 'borntogive'),
            'subtitle' => esc_html__('Enable the themes in maintenance mode.', 'borntogive'),
            "default" => 'off',
            'on' => esc_html__('Enabled', 'borntogive'),
            'off' => esc_html__('Disabled', 'borntogive'),
        ),
        array(
            'id' => 'enable_backtotop',
            'type' => 'switch',
            'title' => esc_html__('Enable Back To Top', 'borntogive'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'borntogive'),
            "default" => 1,
        ),
       array(
            'id' => 'space-before-head',
            'type' => 'ace_editor',
            'title' => esc_html__('Space before closing head tag', 'borntogive'),
            'subtitle' => esc_html__('Add your code before closing head tag', 'borntogive'),
			'default' => '',
        ),
       array(
            'id' => 'space-before-body',
            'type' => 'ace_editor',
            'title' => esc_html__('Space before closing body tag', 'borntogive'),
            'subtitle' => esc_html__('Add your code before closing body tag', 'borntogive'),
			'default' => '',
        ),
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-website',
    'icon_class' => 'icon-large',
    'title' => esc_html__('Responsive', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'switch-responsive',
            'type' => 'switch',
            'title' => esc_html__('Enable Responsive', 'borntogive'),
            'subtitle' => esc_html__('Enable/Disable the responsive behaviour of the theme', 'borntogive'),
            "default" => 1,
        ),
        array(
            'id' => 'switch-zoom-pinch',
            'type' => 'switch',
            'title' => esc_html__('Enable Zoom on mobile devices', 'borntogive'),
            'subtitle' => esc_html__('Enable/Disable zoom pinch behaviour on touch devices', 'borntogive'),
            "default" => 0,
        ),
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-screen',
    'icon_class' => 'icon-large',
    'title' => esc_html__('Layout', 'borntogive'),
    'fields' => array(
        array(
			'id'=>'site_width',
			'type' => 'text',
			'compiler'=>true,
			'title' => esc_html__('Site Width', 'borntogive'), 
			'subtitle' => esc_html__('Controls the overall site width. Without px, ex: 1170(Default). Recommended maximum width is 1170 to maintain the theme structure.', 'borntogive'),
			'default' => '1170',
		),
        array(
			'id'=>'site_layout',
			'type' => 'image_select',
			'compiler'=>true,
			'title' => esc_html__('Page Layout', 'borntogive'), 
			'subtitle' => esc_html__('Select the page layout type', 'borntogive'),
			'options' => array(
					'wide' => array('alt' => 'Wide', 'img' => get_template_directory_uri().'/images/wide.png'),
					'boxed' => array('alt' => 'Boxed', 'img' => get_template_directory_uri().'/images/boxed.png')
				),
			'default' => 'wide',
			),
		array(
			'id'=>'repeatable-bg-image',
			'type' => 'image_select',
			'required' => array('site_layout','equals','boxed'),
			'title' => esc_html__('Repeatable Background Images', 'borntogive'), 
			'subtitle' => esc_html__('Select image to set in background.', 'borntogive'),
			'options' => array(
				'pt1.png' => array('alt' => 'pt1', 'img' => get_template_directory_uri().'/images/patterns/pt1.png'),
				'pt2.png' => array('alt' => 'pt2', 'img' => get_template_directory_uri().'/images/patterns/pt2.png'),
				'pt3.png' => array('alt' => 'pt3', 'img' => get_template_directory_uri().'/images/patterns/pt3.png'),
				'pt4.png' => array('alt' => 'pt4', 'img' => get_template_directory_uri().'/images/patterns/pt4.png'),
				'pt5.png' => array('alt' => 'pt5', 'img' => get_template_directory_uri().'/images/patterns/pt5.png'),
				'pt6.png' => array('alt' => 'pt6', 'img' => get_template_directory_uri().'/images/patterns/pt6.png'),
				'pt7.png' => array('alt' => 'pt7', 'img' => get_template_directory_uri().'/images/patterns/pt7.png'),
				'pt8.png' => array('alt' => 'pt8', 'img' => get_template_directory_uri().'/images/patterns/pt8.png'),
				'pt9.png' => array('alt' => 'pt9', 'img' => get_template_directory_uri().'/images/patterns/pt9.png'),
				'pt10.png' => array('alt' => 'pt10', 'img' => get_template_directory_uri().'/images/patterns/pt10.png'),
				'pt11.jpg' => array('alt' => 'pt11', 'img' => get_template_directory_uri().'/images/patterns/pt11.png'),
				'pt12.jpg' => array('alt' => 'pt12', 'img' => get_template_directory_uri().'/images/patterns/pt12.png'),
				'pt13.jpg' => array('alt' => 'pt13', 'img' => get_template_directory_uri().'/images/patterns/pt13.png'),
				'pt14.jpg' => array('alt' => 'pt14', 'img' => get_template_directory_uri().'/images/patterns/pt14.png'),
				'pt15.jpg' => array('alt' => 'pt15', 'img' => get_template_directory_uri().'/images/patterns/pt15.png'),
				'pt16.png' => array('alt' => 'pt16', 'img' => get_template_directory_uri().'/images/patterns/pt16.png'),
				'pt17.png' => array('alt' => 'pt17', 'img' => get_template_directory_uri().'/images/patterns/pt17.png'),
				'pt18.png' => array('alt' => 'pt18', 'img' => get_template_directory_uri().'/images/patterns/pt18.png'),
				'pt19.png' => array('alt' => 'pt19', 'img' => get_template_directory_uri().'/images/patterns/pt19.png'),
				'pt20.png' => array('alt' => 'pt20', 'img' => get_template_directory_uri().'/images/patterns/pt20.png'),
				'pt21.png' => array('alt' => 'pt21', 'img' => get_template_directory_uri().'/images/patterns/pt21.png'),
				'pt22.png' => array('alt' => 'pt22', 'img' => get_template_directory_uri().'/images/patterns/pt22.png'),
				'pt23.png' => array('alt' => 'pt23', 'img' => get_template_directory_uri().'/images/patterns/pt23.png'),
				'pt24.png' => array('alt' => 'pt24', 'img' => get_template_directory_uri().'/images/patterns/pt24.png'),
				'pt25.png' => array('alt' => 'pt25', 'img' => get_template_directory_uri().'/images/patterns/pt25.png'),
				'pt26.png' => array('alt' => 'pt26', 'img' => get_template_directory_uri().'/images/patterns/pt26.png'),
				'pt27.png' => array('alt' => 'pt27', 'img' => get_template_directory_uri().'/images/patterns/pt27.png'),
				'pt28.png' => array('alt' => 'pt28', 'img' => get_template_directory_uri().'/images/patterns/pt28.png'),
				'pt29.png' => array('alt' => 'pt29', 'img' => get_template_directory_uri().'/images/patterns/pt29.png'),
				'pt30.png' => array('alt' => 'pt30', 'img' => get_template_directory_uri().'/images/patterns/pt30.png')
				)
			),	
		array(
			'id'=>'upload-repeatable-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Repeatable Background Image', 'borntogive')
			),
		array(
			'id'=>'full-screen-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Full Screen Background Image', 'borntogive')
		),	
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Content', 'borntogive'),
	'subsection' => true,
    'fields' => array(
		array(  'id' => 'content_background',
				'type' => 'background',
				'background-color'=> true,
				'output' => array('.content'),
				'title' => __('Content area Background', 'borntogive'),
    			'subtitle' => __('Background color or image for the content area. This works for both boxed or wide layouts.', 'borntogive'),
		),
		array(
			'id'       => 'content_padding',
			'type'     => 'spacing',
			'units'    => array('px'),
			'mode'	   => 'padding',
			'left'	   => false,
			'right'	   => false,
			'output'   => array('.content'),
			'title'    => esc_html__('Top and Bottom padding for content area', 'borntogive'),
			'subtitle' => esc_html__('Enter top and bottom padding for content area. Default is 50px/50px', 'borntogive'),
			'default'            => array(
			'padding-top'     => '60px',
			'padding-bottom'  => '60px',
			'units'          => 'px',
			),
		),
		array(
			'id'       => 'content_min_height',
			'type'     => 'text',
			'title'    => esc_html__('Minimum Height for Content area', 'borntogive'),
			'subtitle' => esc_html__('Enter minimum height for the page content area. DO NOT PUT px HERE. Default is 400', 'borntogive'),
			'default'  => '400'
		),
        array(
			'id'=>'content_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('100% Content Width', 'borntogive'), 
			'subtitle' => esc_html__('Check this box to set the content area to 100% of the browser width. Uncheck to follow site width.', 'borntogive'),
			'default' => '0',
		),

	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-up',
    'title' => esc_html__('Header', 'borntogive'),
    'desc' => esc_html__('These are the options for the header.', 'borntogive'),
    'fields' => array(
		array(
    		'id' => 'header_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Header Layout','borntogive'), 
			'subtitle' => esc_html__('Select the Header layout', 'borntogive'),
    			'options' => array(
					'1' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerlayouts/1.png'),
    				'2' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerlayouts/2.png'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/images/headerlayouts/3.png'),
    				),
    		'default' => '1'
    	),
        array(
			'id'=>'header_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('100% Header Width', 'borntogive'), 
			'subtitle' => esc_html__('Check this box to set the header area to 100% of the browser width. Uncheck to follow site width.', 'borntogive'),
			'default' => '0',
		),
		array(  'id' => 'header_background_alpha',
			'type' => 'color_rgba',
			'output' => array('background-color' => '.header-style2 .site-header, .header-style3 .site-header'),
			'required' => array('header_layout','!=','1'),
			'title' => __('Header Translucent Background Color', 'borntogive'),
			'options'       => array(
				'show_input'                => true,
				'show_initial'              => true,
				'show_alpha'                => true,
				'show_palette'              => false,
				'show_palette_only'         => false,
				'show_selection_palette'    => true,
				'max_palette_size'          => 10,
				'allow_empty'               => true,
				'clickout_fires_change'     => false,
				'choose_text'               => 'Choose',
				'cancel_text'               => 'Cancel',
				'show_buttons'              => true,
				'use_extended_classes'      => true,
				'palette'                   => null,  // show default
				'input_text'                => 'Select Color'
			),
		),
		array(  'id' => 'header_background',
				'type' => 'background',
				'background-color'=> false,
				'output' => array('.header-style2 .site-header, .header-style3 .site-header'),
				'required' => array('header_layout','!=','1'),
				'title' => __('Header Background Image', 'borntogive'),
    			'subtitle' => __('Background image for the header', 'borntogive')
		),
        array(
            'id' => 'enable-search',
            'type' => 'switch',
            'title' => __('Search in Header', 'borntogive'),
            'subtitle' => __('Enable/Disable search form in header', 'borntogive'),
            "default" => 0,
        ),
        array(
            'id' => 'enable-cart',
            'type' => 'switch',
            'title' => __('Cart in Header', 'borntogive'),
            'subtitle' => __('Enable/Disable cart option in header', 'borntogive'),
            "default" => 0,
        ),
		array(
			'id'       => 'search_cart_link_color',
			'type'     => 'link_color',
			'title'    => __('Search, Cart Icon Link Color', 'borntogive'),
			'desc'     => __('Set the links color, hover, active for search and cart icons in the header.', 'borntogive'),
			'output'   => array('.search-module-trigger, .cart-module-trigger'),
		),
		array(
            'id' => 'header_info_1_icon',
            'type' => 'text',
            'title' => esc_html__('Header Info 1 Icon', 'borntogive'),
            'subtitle' => esc_html__('Enter icon class for header info 1. Get class names from http://fontawesome.io/cheatsheet/', 'borntogive'),
            'default' => 'fa-phone'
        ),
		array(
            'id' => 'header_info_1_text',
            'type' => 'text',
            'title' => esc_html__('Header Info 1 Text', 'borntogive'),
            'subtitle' => esc_html__('Enter text for header info 1', 'borntogive'),
            'default' => '1800-9090-8089'
        ),
		array(
            'id' => 'header_info_2_icon',
            'type' => 'text',
            'title' => esc_html__('Header Info 2 Icon', 'borntogive'),
            'subtitle' => esc_html__('Enter icon class for header info 2. Get class names http://fontawesome.io/cheatsheet/', 'borntogive'),
            'default' => 'fa-envelope-o'
        ),
		array(
            'id' => 'header_info_2_text',
            'type' => 'text',
            'title' => esc_html__('Header Info 2 Text', 'borntogive'),
            'subtitle' => esc_html__('Enter text for header info 2', 'borntogive'),
            'default' => 'help@borntogive.com'
        ),
		array(
			'id'       => 'header_info_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'color' => true,
			'line-height' => false,
			'text-align' => false,
			'required' 	=> array('header_layout','=','1'),
			'title'    => __('Header Info Typograohy', 'borntogive'),
			'output'   => array('.header-style1 .header-info-col')
		),
		array(
			'id'       => 'header_info_typo23',
			'type'     => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'color' => true,
			'line-height' => false,
			'text-align' => false,
			'required' 	=> array('header_layout','!=','1'),
			'title'    => __('Header Info Typograohy', 'borntogive'),
			'output'   => array('.header-style2 .topbar .header-info-col, .header-style3 .topbar .header-info-col')
		),
		array(
			'id'       => 'header_info_icon',
			'type'     => 'color',
			'transparent' => false,
			'title'    => __('Header Info Icon Color', 'borntogive'),
			'desc'     => __('Set the color for the header info icons.', 'borntogive'),
			'output'   => array('.header-info-col i'),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Sticky Header', 'borntogive'),
	'subsection' => true,
    'fields' => array(
		array(  'id' => 'sticky_header_background',
			'required' => array('header_layout','!=','3'),
			'type' => 'background',
			'background-color'=> true,
			'output' => array('.sticky.site-header'),
			'title' => esc_html__('Sticky Header Background', 'borntogive'),
			'subtitle' => esc_html__('Background color or image for the header when its sticky.', 'borntogive'),
		),
		array(  'id' => 'sticky_menu_background',
			'required' => array('header_layout','equals','3'),
			'type' => 'background',
			'background-color'=> true,
			'output' => array('.is-sticky .fw-menu-wrapper'),
			'title' => esc_html__('Sticky Menu Background', 'borntogive'),
			'subtitle' => esc_html__('Background color or image for the navigation bar when its sticky.', 'borntogive'),
		),
		array(
			'id'       => 'sticky_link_color',
			'type'     => 'link_color',
			'title'    => __('Sticky Navigation Link Color', 'borntogive'),
			'required' 	=> array('header_layout','!=','3'),
			'desc'     => __('Set the sticky navigation menu links color, hover, active.', 'borntogive'),
			'output'   => array('.sticky .dd-menu > li > a'),
		),
		array(
			'id'       => 'sticky_link_color3',
			'type'     => 'link_color',
			'title'    => __('Sticky Navigation Link Color', 'borntogive'),
			'required' 	=> array('header_layout','=','3'),
			'desc'     => __('Set the sticky navigation menu links color, hover, active.', 'borntogive'),
			'output'   => array('.header-style3 .is-sticky .dd-menu > li > a'),
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Inner Page Header', 'borntogive'),
	'subsection' => true,
    'fields' => array(
        array(
			'id'=>'inner_page_header_display',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('Hide page header', 'borntogive'), 
			'subtitle' => esc_html__('Check this box to hide page header on the inner pages/posts/custom posts. This can be used as default for all inner pages and can override the individual page design options.', 'borntogive'),
			'default' => 0,
		),
		array(
			'id'=>'borntogive_default_banner',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Default Banner Image', 'borntogive'),
			'subtitle' => esc_html__('Upload default banner image for the inner pages header.', 'borntogive'),
            'default' => array('url' => ''),
		),
		array(  'id' => 'inner_page_header_background',
			'type' => 'background',
			'background-color'=> true,
			'background-image'=> false,
			'background-repeat'=> false,
			'background-attachment'=> false,
			'background-size'=> false,
			'background-position'=> false,
			'preview'=> false,
			'output' => array('.page-banner'),
			'title' => esc_html__('Default Banner Color', 'borntogive'),
			'subtitle' => esc_html__('Background color for the inner pages header.', 'borntogive'),
			'default' => array(
				'background-color'=> '#404040'
			)
		),
		array(
			'id'       => 'inner_page_header_min_height',
			'type'     => 'text',
			'title'    => esc_html__('Minimum Height', 'borntogive'),
			'subtitle' => esc_html__('Enter minimum height for the inner pages header. DO NOT PUT px HERE. Default is 300', 'borntogive'),
			'default'  => '300'
		),
        array(
			'id'=>'inner_page_header_title',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => esc_html__('Show page title', 'borntogive'), 
			'subtitle' => esc_html__('Check this box to show page title in the page banner. Uncheck to hide.', 'borntogive'),
			'default' => '1',
		),
        array(
            'id' => 'inner_page_header_title_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Title Typography', 'borntogive'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'output'      => array('.page-banner h1, .page-banner-text'),
			'units'       =>'px',
        ),
        array(
            'id' => 'page_title_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Archive Page Titles', 'imic-framework-admin'),
        ),
		array(
            'id' => 'events_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Events Archive', 'borntogive'),
            'subtitle' => esc_html__('Enter title of the page for the Events post type.', 'borntogive'),
            'default' => 'Events'
        ),
		array(
            'id' => 'blog_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Blog Archive', 'borntogive'),
            'subtitle' => esc_html__('Enter title of the page for the Blog post type.', 'borntogive'),
            'default' => 'Blog'
        ),
		array(
            'id' => 'causes_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Causes Archive', 'borntogive'),
            'subtitle' => esc_html__('Enter title of the page for the Causes post type.', 'borntogive'),
            'default' => 'Causes'
        ),
		array(
            'id' => 'team_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Team Archive', 'borntogive'),
            'subtitle' => esc_html__('Enter title of the page for the Team post type.', 'borntogive'),
            'default' => 'Team'
        ),
		array(
            'id' => 'shop_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Shop Archive', 'borntogive'),
            'subtitle' => esc_html__('Enter title of the page for the Products/Shop post type.', 'borntogive'),
            'default' => 'Shop'
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Topbar', 'borntogive'),
    'desc' => esc_html__('These options are for Header Style 2 and 3 only.', 'borntogive'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'show_topbar',
			'required' => array('header_layout','!=','1'),
            'type' => 'checkbox',
            'title' => esc_html__('Show Topbar', 'borntogive'),
            'subtitle' => esc_html__('Enable/Disable Topbar for Header Style 2/3', 'borntogive'	
			),
            "default" => 1,
       	),
		array(  'id' => 'topbar_background',
			'required' => array('header_layout','!=','1'),
			'type' => 'background',
			'background-color'=> true,
			'background-image'=> false,
			'background-repeat'=> false,
			'background-attachment'=> false,
			'background-size'=> false,
			'background-position'=> false,
			'preview'=> false,
			'output' => array('.topbar'),
			'title' => esc_html__('Background Color', 'borntogive'),
			'subtitle' => esc_html__('Background color for the topbar header.', 'borntogive'),
			'default' => array(
				'background-color'=> '#333333'
			)
		),
        array(
            'id' => 'topbar_info_typography',
			'required' => array('header_layout','!=','1'),
            'type'        => 'typography',
			'title'       => esc_html__('Info Text Typography', 'borntogive'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => false,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'output'      => array('.topbar .header-info-col, .topbar .header-info-col strong'),
			'units'       =>'px',
        ),
        array(
            'id' => 'topbar_info_icon_typography',
			'required' => array('header_layout','!=','1'),
            'type'        => 'typography',
			'title'       => esc_html__('Info Icon Typography', 'borntogive'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'subsets' 	  => false,
			'color' 		  => true,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => true,
            'word-spacing'=>false,
			'line-height' => true,
			'letter-spacing' => false,
			'preview' => false,
			'output'      => array('.topbar .header-info-col i.fa'),
			'units'       =>'px',
        ),
        array(
			'id' => 'header_social_links',
			'required' => array('header_layout','!=','1'),
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'title' => esc_html__('Social Links', 'borntogive'),
			'desc' => esc_html__('Enter the social links and sort to active and display according to sequence in Header topBar.', 'borntogive'),
			'options' => array(
				'fa-facebook' => 'facebook',
				'fa-twitter' => 'twitter',
				'fa-pinterest' => 'pinterest',
				'fa-google-plus' => 'google',
				'fa-youtube' => 'youtube',
				'fa-instagram' => 'instagram',
				'fa-vimeo-square' => 'vimeo',
				'fa-rss' => 'rss',
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-tumblr' => 'tumblr',
				'fa-vk' => 'vk',
				'fa-envelope' => 'Enter Email Address'
			),
		),
        array(
            'id' => 'topbar_social_icon_typography',
			'required' => array('header_layout','!=','1'),
            'type'        => 'typography',
			'title'       => esc_html__('Social Icons Typography', 'borntogive'),
			'google'      => false,
			'font-backup' => false,
			'font-family' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => true,
            'word-spacing'=>false,
			'line-height' => true,
			'letter-spacing' => false,
			'preview' => false,
			'output'      => array('.topbar .topmenu a'),
			'units'       =>'px',
        ),
		array(
			'id'       => 'topbar_social_icon_color',
			'required' => array('header_layout','!=','1'),
			'type'     => 'link_color',
			'hover' 	   => false,
			'active'    => false,
			'visited'  => false,
			'output'   => array('.topbar .topmenu a'),
			'title'    => esc_html__('Social Icons Link Color', 'borntogive'),
			'subtitle' => esc_html__('Set link color for social icons. Normal', 'borntogive'),
		)
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-upload',
    'title' => esc_html__('Logo', 'borntogive'),
    'desc' => esc_html__('These are the options for the header.', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo', 'borntogive'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'borntogive'),
            'default' => array('url' => $default_logo),
        ),
        array(
            'id' => 'retina_logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo for Retina Devices', 'borntogive'),
            'desc' => esc_html__('Retina Display is a marketing term developed by Apple to refer to devices and monitors that have a resolution and pixel density so high – roughly 300 or more pixels per inch', 'borntogive'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'borntogive'),
            'default' => array('url' => $default_retina_logo),
        ),
		array(
            'id' => 'logo_upload_sticky',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Sticky Logo', 'borntogive'),
            'subtitle' => esc_html__('Upload sticky site logo to display in header.', 'borntogive'),
            'default' => array('url' => $logo_sticky),
        ),
        array(
            'id' => 'retina_logo_upload_sticky',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Sticky Logo for Retina Devices', 'borntogive'),
            'desc' => esc_html__('Retina Display is a marketing term developed by Apple to refer to devices and monitors that have a resolution and pixel density so high – roughly 300 or more pixels per inch', 'borntogive'),
            'subtitle' => esc_html__('Upload site sticky logo to display in header.', 'borntogive'),
            'default' => array('url' => $retina_logo_sticky),
        ),
		array(
            'id' => 'retina_logo_width',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Width for Retina Logo', 'borntogive'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'borntogive'),
            'default' => '199'
        ),
		array(
            'id' => 'retina_logo_height',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Height for Retina Logo', 'borntogive'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'borntogive'),
            'default' => '30'
        ),
		array(
            'id' => 'sticky_retina_logo_width',
            'type' => 'text',
            'title' => esc_html__('Standard Sticky Logo Width for Retina Logo', 'borntogive'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'borntogive'),
            'default' => '199'
        ),
		array(
            'id' => 'sticky_retina_logo_height',
            'type' => 'text',
            'title' => esc_html__('Standard Sticky Logo Height for Retina Logo', 'borntogive'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'borntogive'),
            'default' => '30'
        ),
		array(
			'id'             => 'logo_spacing',
			'type'           => 'spacing',
			'output'         => array('.site-logo'),
			'mode'           => 'padding',
			'units'          => array('px'),
			'units_extended' => 'false',
			'title'          => esc_html__('Logo Spacing', 'borntogive'),
			'subtitle'       => esc_html__('Set top, right, bottom, left spacing for the logo', 'borntogive'),
			'default'            => array(
				'padding-top'     => '23px', 
				'padding-right'   => '0px', 
				'padding-bottom'  => '20px', 
				'padding-left'    => '0px',
				'units'          => 'px', 
			)
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Admin Logo', 'borntogive'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_admin_login_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Custom admin login logo', 'borntogive'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Upload a 254 x 95px image here to replace the default wordpress login logo.', 'borntogive'),
            'subtitle' => esc_html__('', 'borntogive'),
            'default' => array('url' => $defaultAdminLogo),
        )
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Favicon Options', 'borntogive'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_favicon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Custom favicon', 'borntogive'),
            'desc' => esc_html__('Upload a image that will represent your website favicon', 'borntogive'),
            'default' => array('url' => $default_favicon),
        ),
        array(
            'id' => 'iphone_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPhone Icon', 'borntogive'),
            'desc' => esc_html__('Upload Favicon for Apple iPhone (57px x 57px)', 'borntogive'),
            'default' => array('url' => $default_iphone),
        ),
        array(
            'id' => 'iphone_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPhone Retina Icon', 'borntogive'),
            'desc' => esc_html__('Upload Favicon for Apple iPhone Retina Version (114px x 114px)', 'borntogive'),
            'default' => array('url' => $default_iphone_retina),
        ),
        array(
            'id' => 'ipad_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPad Icon', 'borntogive'),
            'desc' => esc_html__('Upload Favicon for Apple iPad (72px x 72px)', 'borntogive'),
            'default' => array('url' => $default_ipad),
        ),
        array(
            'id' => 'ipad_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => esc_html__('Apple iPad Retina Icon Upload', 'borntogive'),
            'desc' => esc_html__('Upload Favicon for Apple iPad Retina Version (144px x 144px)', 'borntogive'),
            'default' => array('url' => $default_ipad_retina),
        ),
	)
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => esc_html__('Menu', 'borntogive'),
    'desc' => __('These are the options for the menu.', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'nav_directions_arrows',
            'type' => 'checkbox',
            'title' => __('Direction arrows with menu label', 'borntogive'),
            'subtitle' => __('Uncheck to disable arrows that appear with menu text which is having dropdown. Check to enable.', 'borntogive'),
            "default" => 1,
        ),
        array(
            'id' => 'nav_items_spacing',
            'type' => 'spacing',
            'title' => __('Spacing for the Nav Menu Items', 'borntogive'),
            'desc' => __('Top spacing from this will impact the search icon, cart icon top spacing as well in Header Style 1/2. Header info top spacing for Header style 1 will also use this value.', 'borntogive'),
			'mode' 	   => 'margin',
			'units'    => array('px'),
			'output'   => array('.header-style1 .dd-menu > li, .header-style2 .dd-menu > li'),
			'required' 	=> array('header_layout','!=','3'),
			'default'  => array(
				'margin-top'     => '12', 
				'margin-right'   => '0', 
				'margin-bottom'  => '0', 
				'margin-left'    => '25',
				'units'          => 'px', 
			)
        ),
        array(
            'id' => 'nav_items_spacing3',
            'type' => 'spacing',
            'title' => __('Spacing for the Nav Menu Items', 'borntogive'),
			'mode' 	   => 'margin',
			'units'    => array('px'),
			'output'   => array('.header-style3 .dd-menu > li'),
			'required' 	=> array('header_layout','=','3'),
			'default'  => array(
				'margin-top'     => '0', 
				'margin-right'   => '30', 
				'margin-bottom'  => '0', 
				'margin-left'    => '30',
				'units'          => 'px', 
			)
        ),
		array(
			'id'       => 'main_nav_link_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'color' => false,
			'line-height' => false,
			'text-align' => false,
			'required' 	=> array('header_layout','!=','3'),
			'title'    => __('Main Navigation Links Typography', 'borntogive'),
			'output'   => array('.dd-menu > li > a')
		),
		array(
			'id'       => 'main_nav_link_typo3',
			'type'     => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'color' => false,
			'line-height' => true,
			'text-align' => false,
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Main Navigation Links Typography', 'borntogive'),
			'output'   => array('.header-style3 .dd-menu > li > a')
		),
		array(
			'id'       => 'main_nav_link',
			'type'     => 'link_color',
			'title'    => __('Main Navigation Link Color', 'borntogive'),
			'required' 	=> array('header_layout','=','1'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'borntogive'),
			'output'   => array('.dd-menu > li > a'),
		),
		array(
			'id'       => 'main_nav_link2',
			'type'     => 'link_color',
			'title'    => __('Main Navigation Link Color', 'borntogive'),
			'required' 	=> array('header_layout','=','2'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'borntogive'),
			'output'   => array('.header-style2 .dd-menu > li > a'),
		),
		array(
			'id'       => 'main_nav_link3',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','=','3'),
			'title'    => __('Main Navigation Link Color', 'borntogive'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'borntogive'),
			'output'   => array('.header-style3 .dd-menu > li > a'),
		),
		array(
            'id' => 'fw_menu_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','equals','3'),
			'output' => array('.header-style3 .fw-menu-wrapper'),
            'title' => __('Background color the navigation bar', 'borntogive'),
            'desc' => __('Background color set for the full width main navigation in header style 3.', 'borntogive'),
        ),
		array(
            'id' => 'dd_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > li ul'),
            'title' => __('Background color for dropdown menus', 'borntogive'),
            'desc' => __('Background color set for the dropdowns of main navigation.', 'borntogive'),
        ),
        array(
            'id' => 'dd_dropshadow',
            'type' => 'checkbox',
            'title' => __('Dropdowns Drop Shadow', 'borntogive'),
            'subtitle' => __('Uncheck to disable drop shadow on dropdown div. Check to enable.', 'borntogive'),
            "default" => 1,
        ),
		array(
            'id' => 'dd_border_radius',
            'type' => 'text',
            'title' => __('Dropdowns Border Radius', 'borntogive'),
			'subtitle' => __('Enter the value for border radius on dropdowns div bottom.', 'borntogive'),
            'desc' => __('DO NOT PUT px HERE. Ex: 4', 'borntogive'),
        ),
		array(
			'id'       => 'dd_item_border',
			'type'     => 'border',
			'title'    => __('Dropdown links border bottom', 'borntogive'),
			'output'   => array('.dd-menu > li > ul > li > a, .dd-menu > li > ul > li > ul > li > a, .dd-menu > li > ul > li > ul > ul > li > a'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'dd_item_spacing',
			'type'     => 'spacing',
			'title'    => __('Dropdown links spacing', 'borntogive'),
			'output'   => array('.dd-menu > li > ul > li > a, .dd-menu > li > ul > li > ul > li > a, .dd-menu > li > ul > li > ul > ul > li > a'),
			'mode' 	   => 'padding',
			'units'    => array('px'),
			'default'  => array(
				'padding-top'     => '12', 
				'padding-right'   => '20', 
				'padding-bottom'  => '12', 
				'padding-left'    => '20',
				'units'          => 'px', 
			)
		),
		array(
            'id' => 'dd_item_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > li > ul > li > a:hover, .dd-menu > li > ul > li > ul > li > a:hover, .dd-menu > li > ul > li > ul > ul > li > a:hover'),
            'title' => __('Background color for dropdown menus links hover', 'borntogive'),
        ),
		array(
			'id'       => 'dd_item_link_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'color' => false,
			'line-height' => false,
			'text-align' => false,
			'title'    => __('Dropdown Menu Links Typography', 'borntogive'),
			'output'   => array('.dd-menu > li > ul > li > a, .dd-menu > li > ul > li > ul > li > a, .dd-menu > li > ul > li > ul > ul > li > a')
		),
		array(
			'id'       => 'dd_item_link_color',
			'type'     => 'link_color',
			'title'    => __('Dropdown links color', 'borntogive'),
			'output'   => array('.dd-menu > li > ul > li > a, .dd-menu > li > ul > li > ul > li > a, .dd-menu > li > ul > li > ul > ul > li > a')
		),
		array(
            'id' => 'mm_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > li.megamenu > ul'),
            'title' => __('Megamenu Background color', 'borntogive'),
        ),
		array(
			'id'       => 'mm_title_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Column Title Typography', 'borntogive'),
			'output'   => array('.dd-menu .megamenu-container .megamenu-sub-title, .dd-menu .megamenu-container .widgettitle, .dd-menu .megamenu-container .widget-title')
		),
		array(
			'id'       => 'mm_content_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Content Typography', 'borntogive'),
			'output'   => array('.dd-menu .megamenu-container')
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Mobile Menu', 'borntogive'),
	'subsection' => true,
    'fields' => array(
		array(
			'id'       => 'menu_toggle_typo',
			'type'     => 'typography',
			'text-transform' => false,
			'font-family' => false,
			'font-weight' => false,
			'font-style' => false,
			'color' => false,
			'text-align' => false,
			'preview' => false,
			'title'    => __('Mobile Menu opener icon size', 'borntogive'),
			'output'   => array('#menu-toggle'),
			'default' => array(
				'font-size' => '24px',
				'line-height' => '50px'	
			)
		),
		array(
			'id'       => 'menu_toggle_color',
			'type'     => 'link_color',
			'title'    => __('Mobile Menu opener icon color', 'borntogive'),
			'output'   => array('#menu-toggle')
		),
        array(
            'id' => 'menu_toggle_spacing',
            'type' => 'spacing',
            'title' => __('Spacing for the Mobile Menu opener icon', 'borntogive'),
            'desc' => __('', 'borntogive'),
			'mode' 	   => 'margin',
			'units'    => array('px'),
			'output'   => array('#menu-toggle'),
			'default'  => array(
				'margin-top'     => '12', 
				'margin-right'   => '0', 
				'margin-bottom'  => '0', 
				'margin-left'    => '25',
				'units'          => 'px', 
			)
        ),
		array(
			'id'       => 'mobile_menu_drop_top_position',
			'type'     => 'text',
			'title'    => __('Mobile Menu space from top', 'borntogive'),
			'desc'    => __('DO NOT PUT px HERE.', 'borntogive'),
			'default'   => '73'
		),
		array(
            'id' => 'mobile_menu_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
            'title' => __('Background color for mobile menu', 'borntogive'),
            'desc' => __('Background color set for the mobile navigation.', 'borntogive'),
        ),
		array(
			'id'       => 'mobile_menu_color',
			'type'     => 'link_color',
			'title'    => __('Mobile Menu links color', 'borntogive'),
		),
		array(
			'id'       => 'mobile_menu_border',
			'type'     => 'border',
			'all'	   => false,
			'title'    => __('Mobile Menu links border bottom', 'borntogive'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-down',
    'title' => esc_html__('Footer', 'borntogive'),
    'desc' => esc_html__('These are the options for the footer.', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'full_width_footer',
            'type' => 'checkbox',
            'title' => __('100% Footer Width', 'borntogive'),
            'subtitle' => __('Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'borntogive'),
            "default" => 0,
        ),
        array(
            'id' => 'footer_top_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Widgets Area', 'borntogive'),
        ),
		array(
    		'id' => 'footer_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Footer Layout', 'borntogive'), 
			'subtitle' => esc_html__('Select the footer widgeted area layout', 'borntogive'),
    			'options' => array(
					'12' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-1.png'),
    				'6' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-2.png'),
    				'4' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-3.png'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-4.png'),
					'2' => array('title' => '', 'img' => get_template_directory_uri().'/images/footerColumns/footer-5.png'),
    							),
    		'default' => '4'
    	),
		array(  'id' => 'footer_background',
				'type' => 'background',
				'background-color'=> true,
				'output' => array('.site-footer'),
				'title' => esc_html__('Footer widgets area Background', 'borntogive'),
    			'subtitle' => esc_html__('Background color or image for the footer widgets area.', 'borntogive'),
		),
		array(
			'id'       => 'footer_top_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer widgets area Top/Bottom padding', 'borntogive'),
            'desc' => __('Enter top and bottom spacing for the footer widget area. DO NOT ENTER px HERE.', 'borntogive'),
			'mode' 	   => 'padding',
			'output' => array('.site-footer'),
			'units'    => array('px'),
			'default'  => array(
				'padding-top'     => '70', 
				'padding-bottom'  => '70', 
				'units'          => 'px', 
			)
		),
        array(
			'id'          => 'tfooter_border',
			'type'        => 'border',
			'title'       => __('Footer widgets area border top', 'borntogive'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-footer'),
		),
        array(
			'id'          => 'widgettitle_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'title'       => __('Footer widgets title typography', 'borntogive'),
			'output'      => array('.footer_widget h4.widgettitle, .footer_widget h4.widget-title'),
		),
        array(
			'id'          => 'tfwidget_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'word-spacing' => true,
			'letter-spacing' => true,
			'title'       => __('Footer widgets area text typography', 'borntogive'),
			'output'      => array('.site-footer .footer_widget'),
		),
        array(
			'id'          => 'tfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer widgets area links color', 'borntogive'),
			'output'      => array('.body .site-footer .footer_widget a'),
		),
        array(
            'id' => 'footer_bottom_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Copyrights Area', 'borntogive'),
        ),
        array(
            'id' => 'footer_bottom_enable',
            'type' => 'checkbox',
            'title' => __('Enable Footer copyrights area', 'borntogive'),
            'desc' => __('Uncheck to disable footer copyrights area that comes below the footer widgets area.', 'borntogive'),
			'default' => 1
        ),
        array(
			'id'          => 'bfooter_bg',
			'type'        => 'background',
			'title'       => __('Footer copyrights area background', 'borntogive'),
			'output'      => array('.site-footer-bottom'),
		),
		array(
			'id'       => 'footer_bottom_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer copyrights area Top/Bottom padding', 'borntogive'),
            'desc' => __('Enter top and bottom spacing for the footer copyrights area. DO NOT ENTER px HERE.', 'borntogive'),
			'mode' 	   => 'padding',
			'output' => array('.site-footer-bottom'),
			'units'    => array('px'),
			'default'  => array(
				  'padding-top'     => '20', 
				  'padding-bottom'  => '20', 
				  'units'          => 'px', 
			  )
		),
        array(
			'id'          => 'bfooter_border',
			'type'        => 'border',
			'title'       => __('Footer copyrights area border top', 'borntogive'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-footer-bottom'),
		),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'text',
            'title' => esc_html__('Footer Copyright Text', 'borntogive'),
            'subtitle' => esc_html__(' Enter Copyright Text', 'borntogive'),
            'default' => esc_html__('All Rights Reserved', 'borntogive')
        ),
        array(
			'id'          => 'bfwidget_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'title'       => __('Footer copyrights area text typography', 'borntogive'),
			'output'      => array('.site-footer-bottom'),
		),
        array(
			'id'          => 'bfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer copyrights area links color', 'borntogive'),
			'output'      => array('.body .site-footer-bottom a'),
		),
		array(
			'id'=>'footer_bottom_cont_type',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Copyrights footer right', 'borntogive'), 
			'subtitle' => esc_html__('Choose what to display at the right corner of copyrights footer area. If menu option is chosen then you can set a Menu for location "Footer Menu" at Appearance > Menus', 'borntogive'),
			'options' => array(
				0 => esc_html__('Menu','borntogive'),
				1 => esc_html__('Social Icons','borntogive'),
				2 => esc_html__('None','borntogive'),
			),
			'default' => '0',
		),
		array(
			'id' => 'footer_social_links',
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'required' => array('footer_bottom_cont_type','=','1'),
			'title' => esc_html__('Social Links', 'borntogive'),
			'desc' => esc_html__('Insert Social URL in their respective fields and sort as your desired order.', 'borntogive'),
			'options' => array(
				'fa-facebook' => 'facebook',
				'fa-twitter' => 'twitter',
				'fa-pinterest' => 'pinterest',
				'fa-google-plus' => 'google',
				'fa-youtube' => 'youtube',
				'fa-instagram' => 'instagram',
				'fa-vimeo-square' => 'vimeo',
				'fa-rss' => 'rss',
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-tumblr' => 'tumblr',
				'fa-vk' => 'vk',
				'fa-envelope' => 'Enter Email Address'
			),
		),
		array(
			'id'=>'footer_bottom_icons',
			'required' => array('footer_bottom_cont_type','=','1'),
			'type' => 'typography',
			'google'      => false,
			'font-family'      => false,
			'font-backup' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => true,
            'word-spacing'=>false,
			'line-height' => true,
			'letter-spacing' => false,
			'text-transform' => false,
			'preview' => false,
			'output' => array('.copyrights-col-right .social-icons li a'),
			'title' => esc_html__('Social icons size and color for Site Footer Bottom Social icons', 'borntogive'),
			'default' => array(
				'font-size' => '14px',
				'line-height' => '28px'
			)
		),
		array(
			'id'=>'footer_bottom_icons_link_color',
			'required' => array('footer_bottom_cont_type','=','1'),
			'compiler'=>true,
			'type' => 'link_color',
			'hover' => false,
			'active' => false,
			'output' => array('.copyrights-col-right .social-icons li a'),
			'title' => esc_html__('Link, Hover, Active Color sets for Site Footer Bottom Social icons', 'borntogive'),
			'default' => array(
				'regular' => '#333'
			)
		),
		array(
			'id'=>'footer_bottom_icons_bg',
			'required' => array('footer_bottom_cont_type','=','1'),
			'compiler'=>true,
			'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'preview' => false,
			'output' => array('.copyrights-col-right .social-icons li a'),
			'title' => esc_html__('Background color for Site Footer Bottom Social icons', 'borntogive'),
			'default' => array(
				'background-color' => '#eeeeee'
			)
		),
		array(
			'id'       => 'footer_bottom_icons_dimension',
			'required' => array('footer_bottom_cont_type','=','1'),
			'type'     => 'dimensions',
			'units'    => 'px',
			'output' => array('.copyrights-col-right .social-icons li a'),
			'title'    => __('Width/Height for Site Footer Bottom Social icons', 'borntogive'),
			'default'  => array(
				'width'   => '28px', 
				'height'  => '28px'
			),
		),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => esc_html__('Sidebars', 'borntogive'),
    'fields' => array(
        array(
    		'id' => 'sidebar_position',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Sidebar position','borntogive'), 
			'subtitle' => esc_html__('Select the Global Sidebar Position. Can be overridden by page sidebar settings.', 'borntogive'),
    			'options' => array(
    				'2' => array('title' => 'Left', 'img' => get_template_directory_uri().'/images/2cl.png'),
					'1' => array('title' => 'Right', 'img' => get_template_directory_uri().'/images/2cr.png')
    				),
    		'default' => '1'
    	),
		array(
			'id'       => 'page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'blog_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Blog Posts Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all single posts.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'blog_archive_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Blog Posts Archive/Category Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all blog posts category/archive pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Event Posts Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all single event posts.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_archive_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Event Posts Archive/Category Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all event posts category/archive pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'campaign_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Campaign Posts Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all Campaign event posts.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'campaign_archive_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Campaign Posts Archive/Category Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all Campaign posts category/archive pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'team_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Team Posts Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all Team event posts.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'team_archive_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Team Posts Archive/Category Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar that will display on all Team posts category/archive pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'search_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Search Page Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar for search page.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'product_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Woocommerce Pages Sidebar', 'borntogive'), 
			'desc'     => esc_html__('Select sidebar for Woocommerce pages.', 'borntogive'),
			'data'  => 'sidebars',
			'default'  => '',
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-share',
    'title' => esc_html__('Social Sharing', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'switch_sharing',
            'type' => 'switch',
            'title' => esc_html__('Social Sharing', 'borntogive'),
            'subtitle' => esc_html__('Enable/Disable theme default social sharing buttons for posts/events/sermons single pages', 'borntogive'	
			),
            "default" => 1,
       	),
		 array(
			'id'=>'sharing_style',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Style', 'borntogive'), 
			'subtitle' => esc_html__('Choose the style of share button icons', 'borntogive'),
			'options' => array(
					'0' => esc_html__('Rounded','borntogive'),
					'1' => esc_html__('Squared','borntogive')
				),
			'default' => '0',
			),
		 array(
			'id'=>'sharing_color',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Color', 'borntogive'), 
			'subtitle' => esc_html__('Choose the color scheme of the share button icons', 'borntogive'),
			'options' => array(
					'0' => esc_html__('Brand Colors','borntogive'),
					'1' => esc_html__('Theme Color','borntogive'),
					'2' => esc_html__('GrayScale','borntogive')
				),
			'default' => '0',
			),
		array(
			'id'       => 'share_icon',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Social share options', 'borntogive'),
			'subtitle' => esc_html__('Click on the buttons to disable/enable share buttons', 'borntogive'),
			'options'  => array(
				'1' => 'Facebook',
				'2' => 'Twitter',
				'3' => 'Google',
				'4' => 'Tumblr',
				'5' => 'Pinterest',
				'6' => 'Reddit',
				'7' => 'Linkedin',
				'8' => 'Email',
				'9' => 'VKontakte'
			),
			'default' => array(
				'1' => '1',
				'2' => '1',
				'3' => '1',
				'4' => '1',
				'5' => '1',
				'6' => '1',
				'7' => '1',
				'8' => '1',
				'9' => '0'
			)
		),
		array(
			'id'       => 'share_post_types',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Select share buttons for post types', 'borntogive'),
			'subtitle'     => esc_html__('Uncheck to disable for any type', 'borntogive'),
			'options'  => array(
				'1' => 'Posts',
				'2' => 'Pages',
				'3' => 'Events',
				'4' => 'Campaigns',
				'5' => 'Staff',
			),
			'default' => array(
				'1' => 1,
				'2' => 1,
				'3' => 1,
				'4' => 1,
				'5' => 1,
			)
		),
		array(
			'id'       => 'share_links_alt',
			'type'     => 'section',
			'indent' => true,
			'title'    => esc_html__('Sharing links alt/title text', 'borntogive'),
		),
		array(
            'id' => 'facebook_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Facebook share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Facebook share icon browser tooltip.', 'borntogive'),
            'default' => 'Share on Facebook'
        ),
		array(
            'id' => 'twitter_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Twitter share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Twitter share icon browser tooltip.', 'borntogive'),
            'default' => 'Tweet'
        ),
		array(
            'id' => 'google_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Google Plus share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Google Plus share icon browser tooltip.', 'borntogive'),
            'default' => 'Share on Google+'
        ),
		array(
            'id' => 'tumblr_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Tumblr share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Tumblr share icon browser tooltip.', 'borntogive'),
            'default' => 'Post to Tumblr'
        ),
		array(
            'id' => 'pinterest_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Pinterest share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Pinterest share icon browser tooltip.', 'borntogive'),
            'default' => 'Pin it'
        ),
		array(
            'id' => 'reddit_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Reddit share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Reddit share icon browser tooltip.', 'borntogive'),
            'default' => 'Submit to Reddit'
        ),
		array(
            'id' => 'linkedin_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Linkedin share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Linkedin share icon browser tooltip.', 'borntogive'),
            'default' => 'Share on Linkedin'
        ),
		array(
            'id' => 'email_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for Email share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the Email share icon browser tooltip.', 'borntogive'),
            'default' => 'Email'
        ),
		array(
            'id' => 'vk_share_alt',
            'type' => 'text',
            'title' => esc_html__('Tooltip text for vk share icon', 'borntogive'),
            'subtitle' => esc_html__('Text for the vk share icon browser tooltip.', 'borntogive'),
            'default' => 'Share on vk'
        ),
		array(
			'id'       => 'share_links_styling',
			'type'     => 'section',
			'indent' => true,
			'title'    => esc_html__('Sharing icons styling', 'borntogive'),
		),
		array(
			'id'       => 'share_before_icon',
			'type'     => 'checkbox',
			'title'    => esc_html__('Show sharing icon before the sharing icons', 'borntogive'),
			'default' => 0
		),
		array(
			'id'       => 'share_before_text',
			'type'     => 'text',
			'title'    => esc_html__('Enter title to show before the sharing icons', 'borntogive'),
			'default' => ''
		),
		array(
			'id'       => 'share_before_typo',
			'type'     => 'typography',
			'title'    => esc_html__('Share before text/icon typography', 'borntogive'),
			'output'   => array('.social-share-bar .share-title'),
			'default' => array(
				'line-height' => '30px'
			)
		),
		array(
			'id'       => 'share_icons_box_size',
			'type'     => 'dimensions',
			'title'    => esc_html__('Share icons box size', 'borntogive'),
			'output'   => array('.social-share-bar li a'),
			'default' => array(
				'height' => '30px',
				'width' => '30px'
			)
		),
		array(
			'id'       => 'share_icons_font_size',
			'type'     => 'typography',
			'title'    => esc_html__('Share icons font size', 'borntogive'),
			'desc'    => esc_html__('Keep line height same as height of icon boxes set above', 'borntogive'),
			'font-weight' => false,
			'font-family' => false,
			'font-style' => false,
			'text-align' => false,
			'preview' => false,
			'color' => false,
			'output'   => array('.social-share-bar li a'),
			'default' => array(
				'line-height' => '30px',
				'font-size' => '14px'
			)
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-calendar',
	'id'   => 'Events',
    'title' => esc_html__('Events', 'borntogive'),
    'fields' => array(
		array(
            'id' => 'countdown_timer',
            'type' => 'select',
            'title' => esc_html__('Events Display Time', 'borntogive'),
            'subtitle' => esc_html__('Select till what time events will be displayed on the site: End Time/Start Time', 'borntogive'),
            'options' => array('0' => 'Start Time', '1' => 'End Time'),
            'default' => '0',
        ),
		array(
            'id' => 'event_meta_date',
            'type' => 'select',
            'title' => esc_html__('Events date and time', 'borntogive'),
            'subtitle' => esc_html__('Show event date meta details', 'borntogive'),
            'options' => array('0' => 'Start Time and End Time', '1' => 'Start Time'),
            'default' => '0',
        ),
		array(
            'id' => 'event_multi_separator',
            'type' => 'text',
            'title' => esc_html__('Enter separator for multiple date events.', 'borntogive'),
            'default' => ' ',
        ),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-calendar',
    'title' => esc_html__('Calendar', 'borntogive'),
    'fields' => array(
		array(
			'id'=>'calendar_header_view',
			'type' => 'image_select',
			'compiler'=>true,
			'title' => __('Calendar Header View','borntogive'), 
			'subtitle' => __('Select the view for your calendar header', 'borntogive'),
				'options' => array(
					1 => array('title' => '', 'img' => get_template_directory_uri().'/images/calendarheaderLayout/header-1.jpg'),
					2 => array('title' => '', 'img' => get_template_directory_uri().'/images/calendarheaderLayout/header-2.jpg'),
					),
			'default' => 1
		),
		array(
            'id' => 'calendar_event_limit',
            'type' => 'text',	
            'title' => __('Limit of Events', 'borntogive'),
            'desc' => __('Enter a number to limit number of events to show maximum in a single day block of calendar and remaining in a small popover(Default is 4)', 'borntogive'),
			'default' => '4',
        ),
		 array(
			'id'=>'default_calendar_view',
			'type' => 'radio',
			'title' => esc_html__('Default Calendar View', 'borntogive'), 
			'subtitle' => esc_html__('Choose default view of your events calendar', 'borntogive'),
			'options' => array(
					'month' => esc_html__('Month','borntogive'),
					'basicWeek' => esc_html__('Basic Week','borntogive'),
					'basicDay' => esc_html__('Basic Day','borntogive'),
					'agendaWeek' => esc_html__('Agenda Week','borntogive'),
					'agendaDay' => esc_html__('Agenda Day','borntogive')
				),
			'default' => 'month',
			),
		array(
            'id' => 'calendar_today',
            'type' => 'text',	
            'title' => __('Heading Today', 'borntogive'),
            'desc' => __('Translate Calendar Heading for Today Button', 'borntogive'),
			'default' => 'Today',
        ),
		array(
            'id' => 'calendar_month',
            'type' => 'text',	
            'title' => __('Heading Month', 'borntogive'),
            'desc' => __('Translate Calendar Heading for Month Button', 'borntogive'),
			'default' => 'Month',
        ),
		array(
            'id' => 'calendar_week',
            'type' => 'text',	
            'title' => __('Heading Week', 'borntogive'),
            'desc' => __('Translate Calendar Heading for Week Button', 'borntogive'),
			'default' => 'Week',
        ),
		array(
            'id' => 'calendar_day',
            'type' => 'text',	
            'title' => __('Heading Day', 'borntogive'),
            'desc' => __('Translate Calendar Heading for Day Button', 'borntogive'),
			'default' => 'Day',
        ),
        array(
            'id' => 'calendar_month_name',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name', 'borntogive'),
            'desc' => esc_html__('Insert month name in local language by comma seperated to display on event calender like: January,February,March,April,May,June,July,August,September,October,November,December', 'borntogive'),
			'default' => 'January,February,March,April,May,June,July,August,September,October,November,December',
        ),
		array(
            'id' => 'calendar_month_name_short',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name Short', 'borntogive'),
            'desc' => esc_html__('Insert month name short in local language by comma seperated to display on event calender like: Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec', 'borntogive'),
			'default' => 'Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec',
        ),
		array(
            'id' => 'calendar_day_name',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Day Name', 'borntogive'),
            'desc' => esc_html__('Insert day name in local language by comma seperated to display on event calender like: Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'borntogive'),
			'default' => 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ),
		array(
            'id' => 'calendar_day_name_short',
            'type' => 'textarea',
			'rows' => 2,	
            'title' => esc_html__('Calendar Day Name Short', 'borntogive'),
            'desc' => esc_html__('Insert day name short in local language by comma seperated to display on event calender like: Sun,Mon,Tue,Wed,Thu,Fri,Sat', 'borntogive'),
			'default' => 'Sun,Mon,Tue,Wed,Thu,Fri,Sat',
        ),
		array(
    'id'       => 'event_feeds',
    'type'     => 'checkbox',
    'title'    => esc_html__('Show WP Events', 'borntogive'),
    'desc'     => esc_html__('Check if you wants to show WP Events in Calendar.', 'borntogive'),
    'default'  => '1'// 1 = on | 0 = off
),
		array(
            'id' => 'google_feed_key',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar API Key', 'borntogive'),
            'desc' => esc_html__('Enter Google Calendar Feed API Key.', 'borntogive'),
			'default' => '',
        ),
		array(
            'id' => 'google_feed_id',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar ID', 'borntogive'),
            'desc' => esc_html__('Enter Google Calendar ID.', 'borntogive'),
			'default' => '',
        ),
		array(
			'id'=>'event_default_color',
			'type' => 'color',
			'title' => esc_html__('Event Color', 'borntogive'), 
			'subtitle' => esc_html__('Pick a default color for Events.', 'borntogive'),
			'validate' => 'color',
			'transparent' => false,
			'default' => ''
			),
			array(
			'id'=>'recurring_event_color',
			'type' => 'color',
			'title' => esc_html__('Recurring Event Color', 'borntogive'), 
			'subtitle' => esc_html__('Pick a color for recurring Events.', 'borntogive'),
			'validate' => 'color',
			'transparent' => false,
			'default' => ''
			),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-credit-card',
    'icon_class' => 'icon-large',
    'title' => esc_html__('Paypal Configuration', 'borntogive'),
	'desc' => esc_html__('These settings are for the events and exhibitions tickets payment.', 'borntogive'),
    'fields' => array(
		array(
			'id'       => 'paypal_email',
			'type'     => 'text',
			'title'    => esc_html__('Paypal Email Address', 'borntogive'), 
			'desc'     => esc_html__('Enter Paypal Business Email Address.', 'borntogive'),
			'default'  => '',
		),
		array(
			'id'       => 'paypal_token',
			'type'     => 'text',
			'title'    => esc_html__('Paypal Token', 'borntogive'), 
			'desc'     => esc_html__('Enter Paypal Token ID.', 'borntogive'),
			'default'  => '',
		),
		array(
            'id' => 'paypal_site',
            'type' => 'select',
            'title' => esc_html__('Paypal Site', 'borntogive'),
            'subtitle' => esc_html__('Select paypal site.', 'borntogive'),
            'options' => array('0' => 'Sandbox', '1' => 'Live'),
            'default' => '1',
        ),	
		array(
            'id' => 'paypal_currency',
            'type' => 'select',
            'title' => esc_html__('Payment Currency', 'borntogive'),
            'subtitle' => esc_html__('Select payment currency.', 'borntogive'),
            'options' => array('USD' => 'U.S. Dollar', 'AUD' => 'Australian Dollar', 'BRL' => 'Brazilian Real', 'CAD' => 'Canadian Dollar', 'CZK' => 'Czech Koruna', 'DKK' => 'Danish Krone', 'EUR' => 'Euro', 'HKD' => 'Hong Kong Dollar', 'HUF' => 'Hungarian Forint', 'ILS' => 'Israeli New Sheqel', 'JPY' => 'Japanese Yen', 'MYR' => 'Malaysian Ringgit', 'MXN' => 'Mexican Peso', 'NOK' => 'Norwegian Krone', 'NZD' => 'New Zealand Dollar', 'PHP' => 'Philippine Peso', 'PLN' => 'Polish Zloty', 'GBP' => 'Pound Sterling', 'SGD' => 'Singapore Dollar', 'SEK' => 'Swedish Krona', 'CHF' => 'Swiss Franc', 'TWD' => 'Taiwan New Dollar', 'THB' => 'Thai Baht', 'TRY' => 'Turkish Lira'),
            'default' => 'USD',
        ),	
    )
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-brush',
    'title' => esc_html__('Color Scheme', 'borntogive'),
    'fields' => array(
		 array(
			'id'=>'theme_color_type',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Page Layout', 'borntogive'), 
			'subtitle' => esc_html__('Select the page layout type', 'borntogive'),
			'options' => array(
					'0' => esc_html__('Pre-Defined Color Schemes','borntogive'),
					'1' => esc_html__('Custom Color','borntogive')
				),
			'default' => '0',
			),
        array(
            'id' => 'theme_color_scheme',
            'type' => 'select',
			'required' => array('theme_color_type','equals','0'),
            'title' => esc_html__('Theme Color Scheme', 'borntogive'),
            'subtitle' => esc_html__('Select your themes alternative color scheme.', 'borntogive'),
            'options' => array('color1.css' => 'color1.css', 'color2.css' => 'color2.css', 'color3.css' => 'color3.css', 'color4.css' => 'color4.css', 'color5.css' => 'color5.css', 'color6.css' => 'color6.css', 'color7.css' => 'color7.css', 'color8.css' => 'color8.css', 'color9.css' => 'color9.css', 'color10.css' => 'color10.css','color11.css' => 'color11.css','color12.css' => 'color12.css'),
            'default' => 'color1.css',
        ),	
		array(
			'id'=>'primary_theme_color',
			'type' => 'color',
			'required' => array('theme_color_type','equals','1'),
			'title' => esc_html__('Primary Theme Color', 'borntogive'), 
			'subtitle' => esc_html__('Pick a primary color for the template.', 'borntogive'),
			'validate' => 'color',
			'transparent' => false,
			),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-font',
    'title' => esc_html__('Typography', 'borntogive'),
    'subtitle' => esc_html__('Global Font Family Sets', 'borntogive'),
	'desc' => esc_html__('These options are as per the design which consists of 3 fonts. For more advanced typography options see Sub Sections below this in Left Sidebar. Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Typography Options or click the small cross signs in each select field/delete text from input fields to reset them.', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'heading_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Heading/Secondary font', 'borntogive'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('h1,h2,h3,h4,h5,h6, .featured-link strong, .featured-text strong'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Heading Font', 'borntogive'),
            'default' => array(
            	'font-family' => 'Playfair Display',
				'font-backup' => '',
               ),
        ),
        array(
            'id' => 'body_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Body/Primary font', 'borntogive'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('body, .widget h5'),
			'units'       =>'px',
	    	'subtitle' => esc_html__('Please Enter Body Font.', 'borntogive'),
            'default' => array(
             	'font-family' => 'Lato',
              ),
        ),
        array(
            'id' => 'date_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Date font', 'borntogive'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('.event-date'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Heading Font', 'borntogive'),
            'default' => array(
            	'font-family' => 'Dosis',
				'font-backup' => '',
               ),
        ),
    ),
));
	Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-css',
    'title' => esc_html__('Custom CSS/JS', 'borntogive'),
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => esc_html__('CSS Code', 'borntogive'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'borntogive'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => '',
            'default' => "#header{\nmargin: 0 auto;\n}"
        ),
        array(
            'id' => 'custom_js',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => esc_html__('JS Code', 'borntogive'),
            'subtitle' => esc_html__('Paste your JS code here.', 'borntogive'),
            'mode' => 'javascript',
            'theme' => 'chrome',
            'desc' => '',
            'default' => "jQuery(document).ready(function(){\n\n});"
        )
    ),
));
	Redux::setSection( $opt_name, array(
		  'title' => esc_html__('Import / Export', 'borntogive'),
		  'desc' => esc_html__('Import and Export your Theme Framework settings from file, text or URL.', 'borntogive'),
		  'icon' => 'el-icon-download',
		  'fields' => array(
			  array(
				  'id' => 'opt-import-export',
				  'type' => 'import_export',
				 'title' => esc_html__('Import Export','borntogive'),
				  'subtitle' => esc_html__('Save and restore your Theme options','borntogive'),
				  'full_width' => false,
			  ),
		  ),
));

    /*
     * <--- END SECTIONS
     */
