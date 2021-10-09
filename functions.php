<?php


// change wordpress logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
        		height:65px;
        		width:320px;
        		background-size: 139px 65px;
        		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// ADD IMAGE SUPPORT
add_theme_support('post-thumbnails' );

function custom_labo_theme(){
  // Enqueue styles
  wp_enqueue_style('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('styletheme', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('font_awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('custom_font', '//fonts.googleapis.com/css?family=Poppins:100,300,500,600');
  wp_enqueue_style('main_style', get_stylesheet_uri());

  // Enqueue scripts

  wp_enqueue_script('jQuerycdn', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, false, true );
  wp_enqueue_script('bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', false, '', true );
  wp_enqueue_script('popper_js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', false, '', true );
  wp_enqueue_script('isotop', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array('jquery'), false, true);
   wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', false, '', true );
  wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'custom_labo_theme');



/* --
 Custom post type and taxonomy for Porfolio

-- */


function create_porfolio_function(){
    $labels = array(
        'name' => _x('Portfolios', 'post type general name', 'your_text_domain'),
        'singular_name' => _x('Portfolio', 'post type Singular name', 'your_text_domain'),
        'add_new' => _x('Add Portfolio', '', 'your_text_domain'),
        'add_new_item' => __('Add New Portfolio', 'your_text_domain'),
        'edit_item' => __('Edit Portfolio', 'your_text_domain'),
        'new_item' => __('New Portfolio', 'your_text_domain'),
        'all_items' => __('All Portfolios', 'your_text_domain'),
        'view_item' => __('View Portfolios', 'your_text_domain'),
        'search_items' => __('Search Portfolio', 'your_text_domain'),
        'not_found' => __('No Portfolio found', 'your_text_domain'),
        'not_found_in_trash' => __('No Portfolio on trash', 'your_text_domain'),
        'parent_item_colon' => '',
        'menu_name' => __('Portfolios', 'your_text_domain')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'music'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail')
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        'update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('porfiolio_category', array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'porfiolio_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'cat'))
    );
    register_post_type('portfolio', $args);
    flush_rewrite_rules();
}
add_action('init', 'create_porfolio_function');
