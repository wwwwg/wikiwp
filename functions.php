<?php
	// set content width for embedded media
	if ( ! isset( $content_width ) ) { $content_width = 1024; /* pixels */ }


    // WIKIWP SETUP
	if ( ! function_exists( 'wikiwp_setup' ) ) :
	// Sets up theme defaults and registers support for various WordPress features.
	function wikiwp_setup() {
		// Make theme available for translation. Translations can be filed in the "/languages/" directory.
		load_theme_textdomain( 'wikiwp', get_template_directory() . '/languages' );        

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add thumbnail support
		if ( function_exists( 'add_theme_support' ) ) { 
			add_theme_support( 'post-thumbnails' );
			// default post thumbnail dimensions (cropped)
			the_post_thumbnail( 'thumbnail' );       // Thumbnail (default 150px x 150px max)
			the_post_thumbnail( 'medium' );          // Medium resolution (default 300px x 300px max)
			the_post_thumbnail( 'large' );           // Large resolution (default 640px x 640px max)
			the_post_thumbnail( 'full' );            // Full resolution (original size uploaded)
			// additional image sizes
			add_image_size( 'mini', 100, 100, true ); // 100px x 100px crop
			add_image_size( 'thumbnail-croped', 150, 150, true ); // 150px x 150px croped
			add_image_size( 'medium-croped', 300, 300, true ); // 150px x 150px croped
			add_image_size( 'medium-fix-width', 300, 9999, false ); // 300px wide and unlimited height
		}
        
        // Remove accents on media upload
        add_filter('sanitize_file_name', 'remove_accents' );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );
        
        // Set up the WordPress core custom header feature.
        $args = array(
            'flex-width'    => true,
            'flex-height'    => true,
        );
        add_theme_support( 'custom-header', $args );
        
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'wikiwp_custom_background_args', array(
            'default-color' => 'F0F0F0',
            'default-image' => '',
        ) ) );
    }
	endif; // End of wikiwp_setup
	add_action( 'after_setup_theme', 'wikiwp_setup' );

    
    // OPEN GRAPH
    function wikiwp_doctype_opengraph($og) {
        return $og . ' '.'xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }

    add_filter('language_attributes', 'wikiwp_doctype_opengraph');

    function wikiwp_open_graph() {
        if (is_single()) {
            global $post;
            if(get_the_post_thumbnail($post->ID, 'large')) {
                $thumbnail_id = get_post_thumbnail_id($post->ID);
                $thumbnail_object = get_post($thumbnail_id);
                $image = $thumbnail_object->guid;
            } else {	
                // default open graph image
                // $image = '';
            }

            $description = my_excerpt( $post->post_content, $post->post_excerpt );
            $description = strip_tags($description);
            $description = str_replace("\"", "'", $description);

            echo '<meta property="og:title" content="'. get_the_title().'" />'."\n",
                 '<meta property="og:type" content="article" />'."\n",
                 '<meta property="og:image" content="';
                if (function_exists('wp_get_attachment_thumb_url')) {
                    echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID));
                }
            echo '" />'."\n",
                 '<meta property="og:url" content="'.get_permalink().'" />'."\n",
                 '<meta property="og:description" content="'.$description.'" />'."\n",
                 '<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\n";
        }
    }


    // OPEN GRAPH FOR BETTER SHARING
    add_action('wp_head', 'wikiwp_open_graph');

    function my_excerpt($text, $excerpt) {
        if ($excerpt) return $excerpt;
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
        $text = strip_tags($text);
        $excerpt_length = apply_filters('excerpt_length', 55);
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $words = preg_split("/[\n
         ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if ( count($words) > $excerpt_length ) {
                array_pop($words);
                $text = implode(' ', $words);
                $text = $text . $excerpt_more;
        } else {
                $text = implode(' ', $words);
        }

        return apply_filters('wp_trim_excerpt', $text, $excerpt);
    }


	// LOAD STYLES
	// load stylesheet for bootstrap
	function wikiwp_load_bootstrap_styles() {                       
	  	wp_register_style( 'bootstrap-style', 
	    get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'bootstrap-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_bootstrap_styles');

    // load stylesheet for the theme
	function wikiwp_load_styles() {                       
	  	wp_register_style( 'theme_style', 
	    get_stylesheet_directory_uri().'/style.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'theme_style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_styles');

    // load stylesheet for navigation
	function wikiwp_load_navigation_side_styles() {                       
	  	wp_register_style( 'navigation-side-style', 
	    get_stylesheet_directory_uri().'/css/navigation-side.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'navigation-side-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_navigation_side_styles');

    // load stylesheet for wiki
	function wikiwp_load_wiki_styles() {                       
	  	wp_register_style( 'wiki-style', 
	    get_stylesheet_directory_uri().'/css/wiki.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'wiki-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_wiki_styles');


    // LOAD FUNCTIONS SCRIPT
    function wikiwp_function_script() {
        wp_enqueue_script(
            'functions-script',
            get_stylesheet_directory_uri() . '/js/functions.js',
            array( 'jquery' )
        );
    }
    add_action( 'wp_enqueue_scripts', 'wikiwp_function_script' );


    // CUSTOM LOGO UPLOADER
    add_action( 'customize_register', 'wikiwp_customize_register' );
    function wikiwp_customize_register($wp_customize) {
        $wp_customize->add_section( 'wikiwp_custom_logo', array(
            'title'          => __('Logo', 'wikiwp'),
            'description'    => __('Use your own Logo instead of the blog name.', 'wikiwp'),
            'priority'       => 25,
        ) );

        $wp_customize->add_setting( 'custom_logo', array(
            'default'        => '',
            'sanitize_callback' => 'esc_url_raw'
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
            'label'   => __('Set your own logo', 'wikiwp'),
            'section' => 'wikiwp_custom_logo',
            'settings'   => 'custom_logo',
        ) ) );
    }


    // CUSTOM MENUS
    function wikiwp_custom_menus() {
        register_nav_menus(
            array(
            'main-menu' => __('Main', 'wikiwp'),
            'meta-menu' => __('Meta', 'wikiwp')
            )
        );
    }
    add_action( 'init', 'wikiwp_custom_menus' );


    // ORDER POSTS IN CATEGORIES
    add_action( 'pre_get_posts', 'custom_get_posts' );

    function custom_get_posts( $query ) {
        if( (is_category('news')) ) {    
            $query->query_vars['orderby'] = 'modified';
            $query->query_vars['order'] = 'DESC';
        } else {
            $query->query_vars['orderby'] = 'order';
        }
    }


	// LOAD COMMENT REPLAY SCRIPT
	function wikiwp_load_comment_replay_script(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
	  	wp_enqueue_script( 'comment-reply' );
	}
	add_action('wp_print_scripts', 'wikiwp_load_comment_replay_script');


	// AUTOMATIC FEED LINKS
	add_theme_support( 'automatic-feed-links' );


	// SIDEBAR
	function wikiwp_register_sidebar_left() {
	    // Add sidebar support
        register_sidebar( array(
	        'name' => __( 'Sidebar', 'wikiwp' ),
	        'id' => 'sidebar-1',
	        'description' => __( 'Sidebar on the right hand of the website', 'wikiwp' ),
            'before_widget' => '<div class="dynamic-sidebar-widget">',
            'after_widget' => '<hr></div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
	    ) );

        // Custom sidebar navigation
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Navigation',
            'id' => 'navigation',
            'description' => 'Appears as the sidebar beneath the navigation',
            'before_widget' => '<div class="dynamic-sidebar-widget"><ul>',
            'after_widget' => '<hr></ul></div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar left
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer left',
            'id' => 'footer-left',
            'description' => 'Place your widgets here for the left side of the footer',
            'before_widget' => '<ul class="dynamic-sidebar-widget sidebar-footer-widget">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar middle
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer middle',
            'id' => 'footer-mid',
            'description' => 'Place your widgets here for the middle of the footer',
            'before_widget' => '<ul class="dynamic-sidebar-widget sidebar-footer-widget">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar right
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer right',
            'id' => 'footer-right',
            'description' => 'Place your widgets here for the right side of the footer',
            'before_widget' => '<ul class="dynamic-sidebar-widget sidebar-footer-widget">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }
    }
	add_action( 'widgets_init', 'wikiwp_register_sidebar_left' );
	

	// CHANGE EXCERPT MORE LINK
	function wikiwp_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . __('read more', 'wikiwp').' &raquo;</a>';
	}
	add_filter('excerpt_more', 'wikiwp_excerpt_more');


    /**
     * Thumbnail output handling
     *
     * @return string formatted output in HTML
     */
    function wikiwp_get_thumbnail($post) {
        if ( has_post_thumbnail() ) {
            // home and category
            if (is_category() || is_home() || is_front_page()) { ?>
                <div class="entryThumbnail alignleft">
                    <a class="thumbnailLink thumbnailPostLink" href="<?php esc_url(the_permalink()); ?>">
                        <figure class="thumbnailPost">
                            <?php the_post_thumbnail('mini'); ?>
                        </figure>
                    </a>
                </div>
            <?php }

            // single post and page
            elseif ( is_single() ) {
                // FEATURED IMAGE MEDIUM FIX WIDTH
                if (has_post_thumbnail('medium-fix-width')) {
                    $medium_fix_width_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium-fix-width');
                    echo '<a class="postmeta-thumbnail" href="' . $medium_fix_width_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >hallo</a>';
                } else {
                    $thumbnail_large_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                    echo '<a class="postmeta-thumbnail" href="' . $thumbnail_large_url[0] . '" title="' . the_title_attribute('echo=0') . '" >' . get_the_post_thumbnail($post_id, 'large') . '</a>';
                }
            }
        }
    }


    /**
     * Edit post link output handling
     *
     * @return string formatted output in HTML
     */
    function wikiwp_get_edit_post_link($post) {
        // show edit button if user is logged in
        if (is_user_logged_in()):
            ?>
            <div class="custom-sidebar-widget postmeta-edit">
                <div class="edit">
                    <?php edit_post_link(__('edit', 'wikiwp')); ?>
                </div>
            </div>
        <?php endif;
    }


    /**
     * Post excerpt output handling
     *
     * @return string formatted output in HTML
     */
    function wikiwp_get_post_excerpt($post) {
        ?>

        <article class="entry entryTypePostExcerpt">
                    <div <?php post_class(); ?>>
        <?php wikiwp_get_thumbnail($post); ?>

        <div class="entryContainer">
            <header class="entryHeader">
                <h2 class="entryTitle">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="postinfo postinfo-excerpt">
                    <span><?php the_modified_date(); ?></span>
                </div>
            </header>

            <div class="entryContent">
                <?php the_excerpt(); ?>
            </div>

            <footer class="entryMeta">
                <?php get_template_part('postinfo' ); ?>
            </footer>
        </div>
        </div>
        </article>

        <?php
    }