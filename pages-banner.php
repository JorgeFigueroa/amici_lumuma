<?php 
$borntogive_options = get_option('borntogive_options');
$image_default = (isset($borntogive_options['header_image']))?$borntogive_options['header_image']:array('header_image'=>array('url'=>''));
if(is_home()) { $id = get_option('page_for_posts'); }
else { $id = get_the_ID(); }
$image = $banner_type = '';
$type = get_post_meta($id,'borntogive_pages_Choose_slider_display',true);
if($type==1 || $type==2) {
$height = get_post_meta($id,'borntogive_pages_slider_height',true);
} else {
	$height = '';
}
$color = get_post_meta($id,'borntogive_pages_banner_color',true);
$color = ($color!='' && $color!='#')?$color:'';
if($type==2) {
$image = get_post_meta($id,'borntogive_header_image',true);
$image_src = wp_get_attachment_image_src( $image, 'full', '', array() );
if(is_array($image_src)) { $image = $image_src[0]; } else { $image = $image_default['header_image']['url']; } }
$post_id = get_the_ID();
$post_type = get_post_type($post_id);
$event_archive_title = (isset($borntogive_options['events_archive_title']))?$borntogive_options['events_archive_title']:__('Events', 'borntogive');
$blog_archive_title = (isset($borntogive_options['blog_archive_title']))?$borntogive_options['blog_archive_title']:__('Blog', 'borntogive');
$causes_archive_title = (isset($borntogive_options['causes_archive_title']))?$borntogive_options['causes_archive_title']:__('Causes', 'borntogive');
$team_archive_title = (isset($borntogive_options['team_archive_title']))?$borntogive_options['team_archive_title']:__('Team', 'borntogive');
$shop_archive_title = (isset($borntogive_options['shop_archive_title']))?$borntogive_options['shop_archive_title']:__('Shop', 'borntogive');
if($post_type=='event')
{
	$banner_title = esc_html__($event_archive_title, 'borntogive');
}
elseif($post_type=='post')
{
	$banner_title = esc_html__($blog_archive_title, 'borntogive');
}
elseif($post_type=='campaign')
{
	$banner_title = esc_html__($causes_archive_title, 'borntogive');
}
elseif($post_type=='team')
{
	$banner_title = esc_html__($team_archive_title, 'borntogive');
}
elseif($post_type=='product')
{
	$banner_title = esc_html__($shop_archive_title, 'borntogive');
}
else
{
	$banner_title = get_the_title(get_the_ID());
}
?>
 <div class="hero-area">
 <?php if($color!='')
 {
	 echo '<div class="page-banner parallax" style=" background-color:'.esc_attr($color).'; height:'.esc_attr($height).'px'.';">';
 }
 else
 {
	 echo '<div class="page-banner parallax" style="background-image:url('.esc_url($image).'); height:'.esc_attr($height).'px'.';">';
 }
 ?>
        	<div class="container">
            	<div class="page-banner-text">
        			<h1 class="block-title"><?php echo esc_attr($banner_title); ?></h1>
                </div>
            </div>
        </div>
    </div>