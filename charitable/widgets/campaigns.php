<?php
/**
 * Display a list of campaigns.
 *
 * Override this template by copying it to yourtheme/charitable/widgets/campaigns.php
 *
 * @author  Studio 164a
 * @since   1.0.0
 */

$campaigns = $view_args[ 'campaigns' ];
$show_thumbnail = isset( $view_args[ 'show_thumbnail' ] ) ? $view_args[ 'show_thumbnail' ] : true;
$thumbnail_size = apply_filters( 'charitable_campaign_widget_thumbnail_size', 'borntogive-70x70' );

//@$post_name_category: nome del post
$post_name_category=get_post()->post_name;

//@$filter_campaign: variabile per filtrare le campagne (true=sono nella Pagina di descrizione della categoria)
$filter_campaign=false;

//Verifico se devo filtrare le campagne da visualizzare (true=sono nella Pagina di descrizione della categoria)
if(term_exists($post_name_category, 'campaign_category')){
  $filter_campaign=true;
}

if ( ! $campaigns->have_posts() ) :
    return;
endif;

echo $view_args[ 'before_widget' ];

if ( ! empty( $view_args[ 'title' ] ) ) :

    echo $view_args[ 'before_title' ] . $view_args[ 'title' ] . $view_args[ 'after_title' ];

endif; 
?>

<ol class="campaigns">

<?php while( $campaigns->have_posts() ) : 
    //@$show_campaign: variabile per creare una campagna da visualizzare nel widget
    $show_campaign=true;

    $campaigns->the_post();

    //Verifico se filtrare le campagne da visualizzare
    if($filter_campaign){
        //@$term_list: Array di termini 'slug' del tipo 'campaign_category' per il post corrente($campaigns)
        $term_list = wp_get_post_terms(get_the_ID(), 'campaign_category', array("fields" => "slugs"));
        
//Verifico che tra i temini 'slug' recuperati ci sia il nome del post(true=sono nella Pagina di descrizione della categoria)
        if ( in_array($post_name_category, $term_list) ):
            $show_campaign=true;
        else:
            $show_campaign=false;
        endif;
    }
    
    $campaign = new Charitable_Campaign( get_the_ID() );    
    
    //Verifico se la campagna è terminata e se è da visualizzare
    if($campaign->has_ended()&& $show_campaign==true){
        //Memorizzo l'ID in un array
        $mioArray[]=get_the_ID();
        //Non faccio visualizzare la campagna (verrà visualizzata in seguito)
        $show_campaign=false ;
    }
    
    if ( $show_campaign==true ):
        
        $donated = $campaign->get_percent_donated();
        $donated = str_replace("%", "", $donated);
        if($donated<=30)
        {
                $color = 'F23827';
        }
        elseif($donated>30&&$donated<=60)
        {
                $color = 'F6bb42';
        }
        else
        {
                $color = '8cc152';
        }
    ?>
<li>
                                    <a href="<?php the_permalink() ?>" class="cause-thumb">
                                        <?php 
        if ( $show_thumbnail && has_post_thumbnail() ) :
            the_post_thumbnail( $thumbnail_size, array('class'=>'img-thumbnail') );
		else :
			echo '<img src="'.get_template_directory_uri().'/images/cause-thumb.png" alt="">';
        endif;
        ?>
                                        <div class="cProgress" data-complete="<?php echo esc_attr($donated); ?>" data-color="<?php echo esc_attr($color); ?>">
                                            <strong></strong>
                                        </div>
                                    </a>
                                   	<h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                    <span class="meta-data"><?php echo ''.$campaign->get_time_left(); ?></span>
                                </li>
<?php endif; endwhile;

//Verifico se ci sono campagne terminate
if($mioArray!=null):
    //Imposto il titolo
    echo $view_args[ 'before_title' ] . 'Progetti terminati' . $view_args[ 'after_title' ];
    
    //Ciclo le campagne terminate e le visualizzo
    foreach ($mioArray as $campagna_terminata) :
    
        $campaign = new Charitable_Campaign( $campagna_terminata );    
    
        
        $donated = $campaign->get_percent_donated();
        $donated = str_replace("%", "", $donated);
        if($donated<=30)
        {
                $color = 'F23827';
        }
        elseif($donated>30&&$donated<=60)
        {
                $color = 'F6bb42';
        }
        else
        {
                $color = '8cc152';
        }
    ?>
<li>
    <a href="<?php the_permalink($campagna_terminata) ?>" class="cause-thumb">
                                        <?php 
        if ( $show_thumbnail && has_post_thumbnail($campagna_terminata) ) :
            echo get_the_post_thumbnail( $campagna_terminata,$thumbnail_size, array('class'=>'img-thumbnail') );
		else :
			echo '<img src="'.get_template_directory_uri().'/images/cause-thumb.png" alt="">';
        endif;
        ?>
                                        <div class="cProgress" data-complete="<?php echo esc_attr($donated); ?>" data-color="<?php echo esc_attr($color); ?>">
                                            <strong></strong>
                                        </div>
                                    </a>
    <h5><a href="<?php the_permalink($campagna_terminata) ?>"><?php echo get_the_title($campagna_terminata) ?></a></h5> 

                                    <span class="meta-data"><?php echo ''.$campaign->get_time_left(); ?></span>
                                </li>
    <?php endforeach;
    
//    echo "<pre>FINALE"; print_r($mioArray); echo "</pre>";

    endif; ?>

</ol>

<?php

echo $view_args[ 'after_widget' ];

wp_reset_postdata();