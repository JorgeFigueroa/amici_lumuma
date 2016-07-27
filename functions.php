<?php
/* -----------------------------------------------------------------------------------
  Here we have all the custom functions for the theme
  Please be extremely cautious editing this file,
  When things go wrong, they tend to go wrong in a big way.
  You have been warned!
  ----------------------------------------------------------------------------------- */
/*
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
  ----------------------------------------------------------------------------------- */
define('BORNTOGIVE_THEME_PATH', get_template_directory_uri());
define('BORNTOGIVE_FILEPATH', get_template_directory());
/* -------------------------------------------------------------------------------------
  Load Translation Text Domain
  ----------------------------------------------------------------------------------- */
add_action('after_setup_theme', 'borntogive_theme_setup');
function borntogive_theme_setup() {
    load_theme_textdomain('borntogive', BORNTOGIVE_FILEPATH . '/language');
}
/* -------------------------------------------------------------------------------------
  Menu option
  ----------------------------------------------------------------------------------- */
function register_menu() {
    register_nav_menu('primary-menu', esc_html__('Primary Menu', 'borntogive'));
		register_nav_menu('footer-menu', esc_html__('Footer Menu', 'borntogive'));
}
add_action('init', 'register_menu');
/* -------------------------------------------------------------------------------------
  Set Max Content Width (use in conjuction with ".entry-content img" css)
  ----------------------------------------------------------------------------------- */
if (!isset($content_width))
    $content_width = 680;
/* -------------------------------------------------------------------------------------
  Configure WP2.9+ Thumbnails & gets the current post type in the WordPress Admin
  ----------------------------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
 	add_theme_support('post-formats', array(
   		'video', 'image', 'gallery', 'link'
   	));
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
    	add_theme_support( 'woocommerce' );
	}
    add_theme_support('post-thumbnails');
		add_theme_support( 'title-tag' );
    add_theme_support('automatic-feed-links');
    set_post_thumbnail_size(958, 9999);
	//Mandatory
	add_image_size('borntogive-146x64','146','64',true);
	add_image_size('borntogive-600x400','600','400',true);
	add_image_size('borntogive-70x70','70','70',true);
	add_image_size('borntogive-1000x800','1000','800',true);
	add_image_size('borntogive-100x80','100','80',true);
}
/* -------------------------------------------------------------------------------------
  Custom Gravatar Support
  ----------------------------------------------------------------------------------- */
if (!function_exists('borntogive_custom_gravatar')) {
    function borntogive_custom_gravatar($avatar_defaults) {
        $borntogive_avatar = get_template_directory_uri() . '/images/img_avatar.png';
        $avatar_defaults[$borntogive_avatar] = 'Custom Gravatar (/images/img_avatar.png)';
        return $avatar_defaults;
    }
    add_filter('avatar_defaults', 'borntogive_custom_gravatar');
}
/* -------------------------------------------------------------------------------------
  Load Theme Options
  ----------------------------------------------------------------------------------- */
include_once(BORNTOGIVE_FILEPATH . '/borntogive-framework/borntogive-includes.php');
require_once (get_template_directory() . '/includes/barebones-config.php');
/* -------------------------------------------------------------------------------------
  For Remove Dimensions from thumbnail image
  ----------------------------------------------------------------------------------- */
add_filter('post_thumbnail_html', 'borntogive_remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'borntogive_remove_thumbnail_dimensions', 10);
function borntogive_remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
/* -------------------------------------------------------------------------------------
  Excerpt More and  length
  ----------------------------------------------------------------------------------- */

if (!function_exists('borntogive_excerpt')) {
    function borntogive_excerpt($limit = 50, $closing ='...', $readmore = '') {
        return '<p>' . wp_trim_words(get_the_excerpt(), $limit).$closing. '<a href="'.get_permalink().'">'.$readmore.'</a></p>';
    }
}
/* -------------------------------------------------------------------------------------
  For Paginate
  ----------------------------------------------------------------------------------- */
if (!function_exists('borntogive_pagination')) {
    function borntogive_pagination($pages = '', $range = 4, $paged='') {
        $showitems = ($range * 2) + 1;
				$pagi = '';
		if($paged=='')
		{
			global $paged;
		}
        if (empty($paged))
            $paged = 1;
			if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            $pagi .=  '<ul class="pagination">';
            $pagi .= '<li><a href="' . get_pagenum_link(1) . '" title="'.esc_html__('First','borntogive').'"><i class="fa fa-chevron-left"></i></a></li>';
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 3 || $i <= $paged - $range - 3) || $pages <= $showitems )) {
                    $pagi .= ($paged == $i) ? "<li class=\"active\"><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"\">" . $i . "</a></li>";
                }
            }
           $pagi .= '<li><a href="' . get_pagenum_link($pages) . '" title="'.esc_html__('Last','borntogive').'"><i class="fa fa-chevron-right"></i></a></li>';
            $pagi .= '</ul>';
        }
				return $pagi;
    }
}
/* 	Comment Styling
  /*----------------------------------------------------------------------------------- */
if (!function_exists('borntogive_comment')) {
    function borntogive_comment($comment, $args, $depth) {
        $isByAuthor = false;
        if ($comment->comment_author_email == get_the_author_meta('email')) {
            $isByAuthor = true;
        }
        $GLOBALS['comment'] = $comment;
        ?>
        
        
        
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="post-comment-block">
                <div id="comment-<?php comment_ID(); ?>">
                    <?php echo get_avatar($comment, $size = '80','', '',  array('class'=>'img-thumbnail')); ?>
                    <div class="post-comment-content">
        <?php
         echo preg_replace('/comment-reply-link/', 'comment-reply-link pull-right btn btn-default btn-xs', get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'REPLY'))), 1);
       echo '<h5>' . get_comment_author() .esc_html__(' says','borntogive').'</h5>';
        ?>            
                    <span class="meta-data">
            <?php
            echo get_comment_date();
            esc_html_e(' at ', 'borntogive');
            echo get_comment_time();
            ?>
                    </span>
            <?php if ($comment->comment_approved == '0') : ?>
                        <em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'borntogive') ?></em>
                        <br />
            <?php endif; ?>
            <div class="comment-text">
            <?php comment_text() ?>
            </div>
                </div>
            </div>
            <?php
        }
    }
?>