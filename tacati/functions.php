<?php

global $noprofit_ar;

add_image_size( 'slideshow', '960', '288', true );

if ( !defined( TACATI_TD ) )
{
	define( 'TACATI_TD', 'tacati_textdomain' );
}



function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/**
 * tacati_child_load_languages
 * 
 * set the language for child theme
 *
 * @author Piermaria Cosina
 * 
 */



function tacati_child_load_languages() {
	load_child_theme_textdomain( TACATI_TD, get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'tacati_child_load_languages' );

if ( !function_exists( 'bp_dtheme_enqueue_styles' ) ) :
	function wp_enqueue_styles(){
		$version = '0.2';
		
		wp_register_style( 'screen',  get_theme_root_uri() . '/css/screen.css', array(), $version, 'screen, projection' );
		wp_register_style( 'print',  get_theme_root_uri() . '/css/print.css', array(), $version, 'print' );
		wp_register_style( 'flexslidercss',  get_theme_root_uri() . '/css/flexslider.css', array(), $version, 'screen, projection' );
		wp_register_style( 'bootstrapcss',  get_theme_root_uri() . '/css/bootstrap.css', array(), $version, 'screen, projection' );
		
		wp_register_script( 'bootstrap',  get_theme_root_uri() . '/js/bootstrap.min.js', array(), $version, true );
		wp_register_script( 'flexsliderlib',  get_theme_root_uri() . '/js/jquery.flexslider-min.js', array(), $version, true );
		wp_register_script( 'easing',  get_theme_root_uri() . '/js/jquery.easing.js', array(), $version, true );
		wp_register_script( 'mousewheel',  get_theme_root_uri() . '/js/jquery.mousewheel.js', array(), $version, true );
		wp_register_script( 'flexslider',  get_theme_root_uri() . '/js/flexslider.js', array(), $version, true );
		wp_register_script( 'bugherd',  get_theme_root_uri() . '/js/bugherd.js', array(), $version, true );
		wp_register_script( 'modernizr',  get_theme_root_uri() . '/js/modernizr.js', array(), $version, false );
		
		//wp_enqueue_style( 'fonts' );
		wp_enqueue_style( 'screen' );
		wp_enqueue_style( 'print' );
		wp_enqueue_style( 'bootstrapcss' );
		wp_enqueue_style( 'flexslidercss' );
		
		wp_enqueue_script('jquery',false, array(), $version, true);
		wp_enqueue_script('modernizr',false, array(), $version, false);
		wp_enqueue_script('bootstrap',false, array(), $version, true);
		wp_enqueue_script('easing',false, array('jquery'), $version, true);
		wp_enqueue_script('mousewheel',false, array('jquery'), $version, true);
		wp_enqueue_script('flexsliderlib',false, array('jquery'), $version, true);
		wp_enqueue_script('flexslider',false, array('flexsliderlib'), $version, true);
		wp_enqueue_script( 'bugherd',false, array(), $version, true);
		
	}

	add_action( 'wp_enqueue_scripts', 'wp_enqueue_styles' );
endif;



if ( !function_exists( 'producers_register' ) ) :
function producers_register() {

	$labels = array(
		'name' => _x('Producers', 'post type general name',TACATI_TD),
		'singular_name' => _x('Producers', 'post type singular name',TACATI_TD),
		'add_new' => _x('Add New Producer', 'Gallery item',TACATI_TD),
		'add_new_item' => __('Add New Producers Item',TACATI_TD),
		'edit_item' => __('Edit Producers Item',TACATI_TD),
		'new_item' => __('New Producers Item',TACATI_TD),
		'view_item' => __('View Producers Item',TACATI_TD),
		'search_items' => __('Search Producers',TACATI_TD),
		'not_found' =>  __('Nothing found',TACATI_TD),
		'not_found_in_trash' => __('Nothing found in Trash',TACATI_TD),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 100,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/producers_icon.png',
		'supports' => array('title', 'editor','thumbnail')
	  ); 

	register_post_type( 'producer' , $args );
	}

add_action('init', 'producers_register');
endif;

if ( !function_exists( 'noprofits_register' ) ) :
function noprofits_register() {

	$labels = array(
		'name' => _x('Noprofits', 'post type general name',TACATI_TD),
		'singular_name' => _x('Noprofit', 'post type singular name',TACATI_TD),
		'add_new' => _x('Add New Noprofit', 'Gallery item',TACATI_TD),
		'add_new_item' => __('Add New Noprofits Item',TACATI_TD),
		'edit_item' => __('Edit Noprofits Item',TACATI_TD),
		'new_item' => __('New Noprofits Item',TACATI_TD),
		'view_item' => __('View Noprofits Item',TACATI_TD),
		'search_items' => __('Search Noprofits',TACATI_TD),
		'not_found' =>  __('Nothing found',TACATI_TD),
		'not_found_in_trash' => __('Nothing found in Trash',TACATI_TD),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 100,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/noprofits_icon.png',
		'supports' => array('title', 'editor','thumbnail')
	  ); 

	register_post_type( 'noprofit' , $args );
	}

add_action('init', 'noprofits_register');
endif;

if ( !function_exists( 'pdr_register' ) ) :
function pdr_register() {

	$labels = array(
		'name' => _x('PDRs', 'post type general name',TACATI_TD),
		'singular_name' => _x('PDR', 'post type singular name',TACATI_TD),
		'add_new' => _x('Add New PDR', 'Gallery item',TACATI_TD),
		'add_new_item' => __('Add New PDR Item',TACATI_TD),
		'edit_item' => __('Edit PDR Item',TACATI_TD),
		'new_item' => __('New PDR Item',TACATI_TD),
		'view_item' => __('View PDR Item',TACATI_TD),
		'search_items' => __('Search PDRs',TACATI_TD),
		'not_found' =>  __('Nothing found',TACATI_TD),
		'not_found_in_trash' => __('Nothing found in Trash',TACATI_TD),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 100,
		'menu_icon' => get_stylesheet_directory_uri() . '/images/PDR_icon.png',
		'supports' => array('title', 'editor','thumbnail')
	  ); 

	register_post_type( 'pdr' , $args );
	}

add_action('init', 'pdr_register');
endif;

if ( !function_exists( 'get_related_products' ) ) :
function get_related_products($producerID){
	
	$args = array( 
		'posts_per_page' => -1,
		'post_type'=>'product' ,
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);
		
	query_posts( $args );
	
	// The Loop
	while (have_posts() ) : the_post();
		
		$producers = get_field('producer');?>
		
		<?php if( $producers  ): ?>
			
			<?php foreach( $producers as $producer): ?>
				
					<?php if ( $producer->ID == $producerID): ?>
						<?php woocommerce_get_template_part( 'content', 'product' ); ?>
					<?php endif; ?>
				
			<?php endforeach; ?>
			
		<?php endif;?>

		
	<?php endwhile;	
	
	// Reset Query
	wp_reset_query();
}

add_action('related_products', 'get_related_products', 10, 1);
endif;

if ( !function_exists( 'get_noprofits_list' ) ) :
function get_noprofits_list(){

	$args = array( 
		'posts_per_page' => 20,
		'post_type'=>'noprofit' ,
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);

	
	query_posts( $args );
	
	// The Loop
	while (have_posts() ) : the_post();?>
				
					<li>
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  			the_post_thumbnail('thumbnail');
								}else{
									echo '<div class="noimage"></div>';
								}  ?>
						<div class="descrizione">   
							<h4><a target="_blank" href="<?php the_field("link"); ?>"><?php the_title(); ?></a></h4>
							<?php the_content()?>
						</div>
						<a class="link" target="_blank" href="<?php the_field("link"); ?>"><?php the_field("link_text"); ?></a>
						<div class="border">
							<ul>    
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
						</div>
					</li>
<?php endwhile;	

	// Reset Query
	wp_reset_query();
}

add_action('list_noprofits', 'get_noprofits_list');
endif;

if ( !function_exists( 'get_producers_list' ) ) :
function get_producers_list(){

	$args = array( 
		'posts_per_page' => -1,
		'post_type'=>'producer',
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);

	
	query_posts( $args );
	
	// The Loop
	while (have_posts() ) : the_post();?>
				
					<li>
						<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  			the_post_thumbnail('thumbnail');
								}else{
									echo '<div class="noimage"></div>';
								}  ?>
						</a>
						<div class="descrizione">   
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="entry-title producer-type"><?php the_field('type'); ?></span></h4>
							<?php the_excerpt()?>
							<a href="<?php the_permalink(); ?>"><?php __('dettaglio', TACATI_TD); ?></a>
						</div>
						
						<div class="border">
							<ul>    
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
						</div>
					</li>
				<li>	
				</li>
<?php endwhile;	

	// Reset Query
	wp_reset_query();
}

add_action('list_producers', 'get_producers_list');
endif;

if( !function_exists( 'get_slideshow') ) :
function get_slideshow($slideshow, $carousel){
	 $images = get_field($slideshow);
	
	 if( $images ): ?>
		<div id="slider" class="flexslider">
			<ul class="slides">
				<?php foreach( $images as $image ): ?>
					<li>
						<img src="<?php echo $image['sizes']['slides']; ?>" alt="<?php echo $image['alt']; ?>" />
						<!-- <p class="flex-caption"><?php echo $image['caption']; ?></p> -->
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	
		/*
		*  The following code creates the thumbnail navigation
		*/
		
		if ($carousel):?>
		<div id="carousel" class="flexslider">
			<ul class="slides flex-control-nav flex-control-thumbs">
				<?php foreach( $images as $image ): ?>
					<li>
						<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		
	<?php endif; 
	else:
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		  echo '<div class="featured">';
		  the_post_thumbnail("slideshow");
		  echo '</div>';
		}
	endif; 
	
}

add_action('print_slideshow', 'get_slideshow', 10, 2);
endif;

if( !function_exists( 'get_customslideshow') ) :
function get_customslideshow($carousel){

	$images = get_field("slides");

	 if( $images ): ?>
		<div id="slider" class="flexslider">
			<ul class="slides">
				<?php foreach( $images as $image ): ?>
					<li>
						<img src="<?php echo $image['immagine']['sizes']['slides']; ?>" alt="<?php echo $image['immagine']['alt'];?>"/>
						<div class="<?php echo $image['position']; ?>">
							<div class="background"></div>
							<div class="content">
								<h1><?php echo $image['titolo']; ?></h1>
								<h5><?php echo $image['sottotitolo']; ?></h5>
								<?php echo $image['text']; ?>
							</div>
							</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php

		/*
		*  The following code creates the thumbnail navigation
		*/

		if ($carousel):?>
		<div id="carousel" class="flexslider">
			<ul class="slides flex-control-nav flex-control-thumbs">
				<?php foreach( $images as $image ): ?>
					<li>
						<img src="<?php echo $image['immagine']['sizes']['thumbnail']; ?>" alt="<?php echo $image['immagine']['alt'];?>" />
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

	<?php endif;

	else:
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		  the_post_thumbnail();
		}
	endif; 

}

add_action('print_customslideshow', 'get_customslideshow', 10, 1);
endif;

if( !function_exists( 'get_related_producers' ) ):
	function get_related_producers(){
		$producers = get_field('producer');		
		if( $producers ): ?>
			<div class="related-producers">
				<h3><?php __('Prodotto da', TACATI_TD); ?></h3>
				<ul>
				<?php foreach( $producers as $producer): ?>
					<li>
						<h4><a href="<?php echo get_permalink($producer->ID); ?>"><?php echo get_the_title($producer->ID); ?></a></h4>	
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif;
	}
	
	add_action('related_producers', 'get_related_producers');
endif;

if( !function_exists( 'get_first_related_producer' ) ):
	function get_first_related_producer(){
		$producers = get_field('producer');		
		if( $producers ): ?>
		<?php foreach( $producers as $producer): ?>
					
			<a href="<?php echo get_permalink($producer->ID); ?>"><?php echo get_the_title($producer->ID); ?></a><br />		
					
		<?php endforeach; ?>
		<?php endif;
	}

	add_action('first_related_producer', 'get_first_related_producer');
endif;

if ( !function_exists( 'get_pdr_list' ) ) :
function get_pdr_list(){

	$args = array( 
		'posts_per_page' => -1,
		'post_type'=>'pdr' ,
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);

	
	query_posts( $args );
	
	// The Loop
	while (have_posts() ) : the_post();?>

				<li>
					<a href="<?php the_field("map"); ?>">
					<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					  			the_post_thumbnail('thumbnail');
							}else{
								echo '<div class="noimage"></div>';
							}  ?>
					</a>
					<div class="descrizione">   
						<h4><a target="_blank" href="<?php the_field("map"); ?>"><?php the_title(); ?></a></h4>
						<?php the_content()?>
					</div>
					<?php if(get_field("map")):?>
							<a target="_blank" class="link long" href="<?php the_field("map"); ?>"><?php if(get_field("location")){
								the_field("location");}?></a>
					<?php endif; ?>
					<div class="border">
						<ul>    
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</li>
				
				

<?php endwhile;	

	// Reset Query
	wp_reset_query();
}

add_action('list_pdr', 'get_pdr_list');
endif;


// unregister all default WP Widgets
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);



if ( !function_exists( 'get_sites_list' ) ) :
function get_sites_list(){
	$blog_list = get_blog_list( 0, 'all' );
	foreach ($blog_list AS $blog) {
	 $blog_name = get_blog_option( $blog['blog_id'], 'blogname' );
	echo '<li><a href="'.$blog['path'].'">'.$blog_name.'</a></li>';
	}
}
add_action('list_sites','get_sites_list');
endif;

if ( !function_exists( 'register_new_sidebars' ) ) :
function register_new_sidebars() {

	register_sidebar( array(
		'name' => __( 'Header Area', TACATI_TD ),
		'id' => 'sidebar-6',
		'description' => __( 'An optional widget area for your site header', TACATI_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header top', TACATI_TD ),
		'id' => 'sidebar-7',
		'description' => __( 'An optional widget area for your site header', TACATI_TD ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'register_new_sidebars' );
endif;



/**
 * Define columns for the orders page.
 *
 * @access public
 * @param mixed $columns
 * @return array
 */
function woocommerce_edit_order_columns2($columns){
	global $woocommerce;

	$columns = array();

	$columns["cb"] = "<input type=\"checkbox\" />";
	$columns["order_status"] = __("Status", TACATI_TD);
	$columns["order_title"] = __("Order", TACATI_TD);
	$columns["billing_address"] = __("Billing", TACATI_TD);
	$columns["shipping_address"] = __("Shipping", TACATI_TD);
	$columns["total_cost"] = __("Order Total", TACATI_TD);
	$columns["giorno_consegna"] = __("Days of delivery", TACATI_TD);
	$columns["orario"] = __("Hour", TACATI_TD);
	$columns["noprofit"] = __("Noprofit", TACATI_TD);
	$columns["order_comments"] = '<img alt="' . esc_attr__( 'Order Notes', TACATI_TD ) . '" src="' . $woocommerce->plugin_url() . '/assets/images/order-notes_head.png" class="tips" data-tip="' . __("Order Notes", TACATI_TD) . '" width="12" height="12" />';
	$columns["note"] = '<img src="' . $woocommerce->plugin_url() . '/assets/images/note_head.png" alt="' . __("Customer Notes", TACATI_TD) . '" class="tips" data-tip="' . __("Customer Notes", TACATI_TD) . '" width="12" height="12" />';
	$columns["order_date"] = __("Date", TACATI_TD);
	$columns["order_actions"] = __("Actions", TACATI_TD);

	return $columns;
}

add_filter('manage_edit-shop_order_columns', 'woocommerce_edit_order_columns2');
/**
 * Values for the custom columns on the orders page.
 *
 * @access public
 * @param mixed $column
 * @return void
 */
function woocommerce_custom_order_columns2( $column ) {

	global $post, $woocommerce;
	$order = new WC_Order( $post->ID );

	switch ($column) {
		case "order_status" :

			printf( '<mark class="%s">%s</mark>', sanitize_title($order->status), __($order->status, TACATI_TD) );

		break;
		case "order_title" :

			if ($order->user_id) $user_info = get_userdata($order->user_id);

			if (isset($user_info) && $user_info) :

				$user = '<a href="user-edit.php?user_id=' . esc_attr( $user_info->ID ) . '">';

				if ($user_info->first_name || $user_info->last_name) $user .= $user_info->first_name.' '.$user_info->last_name;
				else $user .= esc_html( $user_info->display_name );

				$user .= '</a>';

		   	else :
		   		$user = __('Guest', TACATI_TD);
		   	endif;

		   	echo '<a href="'.admin_url('post.php?post='.$post->ID.'&action=edit').'"><strong>'.sprintf( __('Order %s', TACATI_TD), $order->get_order_number() ).'</strong></a> ' . __('made by', TACATI_TD) . ' ' . $user;

		   	if ($order->billing_email) :
				echo '<small class="meta">'.__('Email:', TACATI_TD) . ' ' . '<a href="' . esc_url( 'mailto:'.$order->billing_email ).'">'.esc_html( $order->billing_email ).'</a></small>';
			endif;
			if ($order->billing_phone) :
				echo '<small class="meta">'.__('Tel:', TACATI_TD) . ' ' . esc_html( $order->billing_phone ) . '</small>';
			endif;

		break;
		case "billing_address" :
			if ($order->get_formatted_billing_address()) :

				echo '<a target="_blank" href="' . esc_url( 'http://maps.google.com/maps?&q='.urlencode( $order->get_billing_address() ).'&z=16' ) . '">'. preg_replace('#<br\s*/?>#i', ', ', $order->get_formatted_billing_address()) .'</a>';
			else :
				echo '&ndash;';
			endif;

			if ($order->payment_method_title) :
				echo '<small class="meta">' . __('Via', TACATI_TD) . ' ' . esc_html( $order->payment_method_title ) . '</small>';
			endif;

		break;
		case "shipping_address" : 
			$shipping_location = $order->get_shipping_method();
			switch($shipping_location){
			case 'Ufficio':
			case 'Casa':
			case 'Corriere':
				if ($order->get_formatted_shipping_address()) :
				
					echo '<a target="_blank" href="' . esc_url( 'http://maps.google.com/maps?&q='.urlencode( $order->get_shipping_address() ).'&z=16' ) .'">'. preg_replace('#<br\s*/?>#i', ', ', $order->get_formatted_shipping_address()) .'</a>';
				else :
					echo '&ndash;';
				endif;
				
				if ($order->shipping_method_title) :
					echo '<small class="meta">' . __('Via', TACATI_TD) . ' ' . esc_html( $order->shipping_method_title ) . '</small>';
				endif;
			break;
			default:	
				echo $shipping_location;
			break;
		}
		break;
		case "total_cost" :
			echo $order->get_formatted_order_total();
		break;
		case "order_date" :

			if ( '0000-00-00 00:00:00' == $post->post_date ) :
				$t_time = $h_time = __( 'Unpublished', TACATI_TD );
			else :
				$t_time = get_the_time( __( 'Y/m/d g:i:s A', TACATI_TD ), $post );

				$gmt_time = strtotime($post->post_date_gmt);
				$time_diff = current_time('timestamp', 1) - $gmt_time;

				if ( $time_diff > 0 && $time_diff < 24*60*60 )
					$h_time = sprintf( __( '%s ago', TACATI_TD ), human_time_diff( $gmt_time, current_time('timestamp', 1) ) );
				else
					$h_time = get_the_time( __( 'Y/m/d', TACATI_TD ), $post );
			endif;

			echo '<abbr title="' . $t_time . '">' . apply_filters( 'post_date_column_time', $h_time, $post ) . '</abbr>';

		break;
		case "order_actions" :

			?><p>
				<?php
					do_action( 'woocommerce_admin_order_actions_start', $order );

					$actions = array();

					if ( in_array( $order->status, array( 'pending', 'on-hold' ) ) )
						$actions[] = array(
							'url' 		=> wp_nonce_url( admin_url( 'admin-ajax.php?action=woocommerce-mark-order-processing&order_id=' . $post->ID ), 'woocommerce-mark-order-processing' ),
							'name' 		=> __( 'Processing', TACATI_TD ),
							'action' 	=> "processing"
						);

					if ( in_array( $order->status, array( 'pending', 'on-hold', 'processing' ) ) )
						$actions[] = array(
							'url' 		=> wp_nonce_url( admin_url( 'admin-ajax.php?action=woocommerce-mark-order-complete&order_id=' . $post->ID ), 'woocommerce-mark-order-complete' ),
							'name' 		=> __( 'Complete', TACATI_TD ),
							'action' 	=> "complete"
						);

					$actions[] = array(
							'url' 		=> admin_url( 'post.php?post=' . $post->ID . '&action=edit' ),
							'name' 		=> __( 'View', TACATI_TD ),
							'action' 	=> "view"
						);

					$actions = apply_filters( 'woocommerce_admin_order_actions', $actions, $order );

					foreach ( $actions as $action )
						printf( '<a class="button tips" href="%s" data-tip="%s"><img src="%s" alt="%s" width="14" /></a>', $action['url'], $action['name'], $woocommerce->plugin_url() . '/assets/images/icons/' . $action['action'] . '.png', $action['name'] );

					do_action( 'woocommerce_admin_order_actions_end', $order );
				?>
			</p><?php

		break;
		case "note" :

			if ($order->customer_note)
				echo '<img src="'.$woocommerce->plugin_url().'/assets/images/note.png" alt="yes" class="tips" data-tip="'. __('Yes', TACATI_TD) .'" width="14" height="14" />';
			else
				echo '<img src="'.$woocommerce->plugin_url().'/assets/images/note-off.png" alt="no" class="tips" data-tip="'. __('No', TACATI_TD) .'" width="14" height="14" />';

		break;
		case "order_comments" :

			echo '<div class="post-com-count-wrapper">
				<a href="'. admin_url('post.php?post='.$post->ID.'&action=edit') .'" class="post-com-count"><span class="comment-count">'. $post->comment_count .'</span></a>
				</div>';
		break;
		case "orario" :
			woocommerce_custom_hours($order);
		break;
		case "giorno_consegna" :
			woocommerce_custom_days($order);
		break;
		case "noprofit" :
			//woocommerce_custom_noprofit($order);
		break;
	}
}

add_action('manage_shop_order_posts_custom_column', 'woocommerce_custom_order_columns2', 2);


remove_action( 'manage_shop_order_posts_custom_column','woocommerce_custom_order_columns',2 );

/**
 * Add the field to the checkout
 **/
//add_action('woocommerce_after_order_notes', 'noprofit_field');

function woocommerce_custom_hours($order){	
	echo get_woocommerce_custom_hours($order);
}
function woocommerce_custom_days($order){
	echo get_woocommerce_custom_days($order);
}
function woocommerce_custom_noprofit($order){
	echo get_woocommerce_custom_noprofit($order);	
}

function get_woocommerce_custom_hours($order){
	
	$hours_ar = get_post_meta($order->id, "orari");
	return $hours_ar[0];
}
function get_woocommerce_custom_days($order){
	$days_ar = get_post_meta($order->id, "giorno");
	return $days_ar[0];
}
function get_woocommerce_custom_noprofit($order){
	$noprofit_ar = get_post_meta($order->id, "noprofit");
	return  $noprofit_ar[0];

}

function noprofit_field( $checkout ) {
	global $noprofit_ar;
	get_noprofit_array();
	echo '<div id="noprofit_field"><h3>'.__('noprofit', TACATI_TD).'</h3>';


	

	
	woocommerce_form_field( 'noprofit', array(
		'type'          => 'select',
		'class'         => array('onlus_field form-row-wide'),
		
		'placeholder'       => __('Enter something', TACATI_TD),
		'options' => $noprofit_ar
		), $checkout->get_value( 'noprofit' ));

	echo '</div>';
}
/**
 * Process the checkout
 **/
add_action('woocommerce_after_order_notes', 'orari_field');


function orari_field( $checkout ) {
	$orari_ar = explode(',',get_field("orari_ritiro","options"));
	echo '<div id="orari_field"><h3>'.__('orari', TACATI_TD).'</h3>';

	woocommerce_form_field( 'orari', array(
		'type'          => 'select',
		'class'         => array('orari_field form-row-wide'),
		
		'placeholder'       => __('Enter something', TACATI_TD),
		'options' => $orari_ar
		), $checkout->get_value( 'orari' ));

	echo '</div>';
}

/**
 * Process the checkout
 **/
add_action('woocommerce_after_order_notes', 'giornate_field');


function giornate_field( $checkout ) {
	$giorni_ar = explode(',',get_field("giorno_consegna","options"));
	echo '<div id="giornate_field"><h3>'.__('giornate', TACATI_TD).'</h3>';

	woocommerce_form_field( 'giorno', array(
		'type'          => 'select',
		'class'         => array('giorno_field form-row-wide'),
		
		'placeholder'       => __('Enter something', TACATI_TD),
		'options' => $giorni_ar
		), $checkout->get_value( 'giorno' ));

	echo '</div>';
}



/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
	global $woocommerce;

	// Check if set, if its not set add an error.
	// if (!$_POST['noprofit']){
	// 	 $woocommerce->add_error( __('Please enter something into the noprofit shiny field.', TACATI_TD) );
	//  }
	if (!$_POST['orari']){
		 $woocommerce->add_error( __('Please enter something into the delivery hours shiny field.', TACATI_TD) );
	 }
	if (!$_POST['giorno']){
		 $woocommerce->add_error( __('Please enter something into the days of delivery shiny field.', TACATI_TD) );
	 }
}

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id , $posted ) {
	global $noprofit_ar;
	if ($_POST['noprofit']) {
			
			$singolo_noprofit = $noprofit_ar[$_POST['noprofit']];
			
		update_post_meta( $order_id, 'noprofit', esc_attr($singolo_noprofit));
	}
	
	
		if ($_POST['orari']) {
			$ar_orari=explode(',',get_field("orari_ritiro","options"));
			$singolo_orario = $ar_orari[$_POST['orari']];
			
			update_post_meta( $order_id, 'orari', esc_attr($singolo_orario));
		}
	
	if ($_POST['giorno']) {
		$ar_giorni=explode(',',get_field("giorno_consegna","options"));
		$singolo_giorno = $ar_giorni[$_POST['giorno']];
		
		update_post_meta( $order_id, 'giorno', esc_attr($singolo_giorno));
	}
}

function add_registration(){
	echo '<p class="register_form"><a href="'.site_url().'/mio-profilo">Registrati</a></p>'; 
}

add_action('woocommerce_login_widget_logged_out_after_form', 'add_registration' );



include_once('woocommerce/custom_widgets/widget-cart.php');
include_once('woocommerce/custom_widgets/widget-recently_viewed.php');
include_once('woocommerce/custom_widgets/widget-login.php');
function woocommerce_register_widgets_CUSTOM() {
register_widget('WooCommerce_Widget_Cart_CUSTOM');
register_widget('WooCommerce_Widget_Recently_Viewed_CUSTOM');
register_widget('WooCommerce_Widget_login_CUSTOM');
}
add_action('widgets_init', 'woocommerce_register_widgets_CUSTOM');



/**
 * Output featured products
 *
 * @access public
 * @param array $atts
 * @return string
 */
function custom_woocommerce_featured_products( $per_page, $order_by, $order, $columns, $category ) {
	global $woocommerce_loop;
	
	if ( is_search() ) :
		return;
	elseif ( is_tax() ) :
		global $wp_query;
		$category=$wp_query->query_vars['term'];
		
		$args = array(
					'post_type'	=> 'product',
					'post_status' => 'publish',
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' => $per_page,
					'orderby' => $orderby,
					'order' => $order, 
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field' => 'slug',
							'terms' => $category
						)
					),
					'meta_query' => array(
						array(
							'key' => '_visibility',
							'value' => array('catalog', 'visible'),
							'compare' => 'IN'
						),
						array(
							'key' => '_featured',
							'value' => 'yes'
						)
						
					)
				);		
	else :
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'orderby' => $orderby,
			'order' => $order,
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
				array(
					'key' => '_featured',
					'value' => 'yes'
				)
			)
		);
	endif;
	
	

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>
		
		<h5	class="page-title"><?php __('Prodotti consigliati in', TACATI_TD)?>  <?php if ( is_search() ) : ?>
			<?php
				printf( __( 'Search Results: &ldquo;%s&rdquo;', TACATI_TD ), get_search_query() );
				if ( get_query_var( 'paged' ) )
					printf( __( '&nbsp;&ndash; Page %s', TACATI_TD ), get_query_var( 'paged' ) );
			?>
		<?php elseif ( is_tax() ) : ?>
			<?php echo single_term_title( "", false ); ?>
		<?php else : ?>
			<?php
				$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
		
		
				echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
		
		
			?>
		<?php endif; ?></h5>
		
		<ul class="featured products">
			
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php woocommerce_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		</ul>

	<?php endif;

	wp_reset_query();

	return ob_get_clean();
}
add_action( 'custom_featured_products', 'custom_woocommerce_featured_products', 10, 5 );


function woocommerce_template_single_weight() {
	if(get_field('weight')): 

				echo "<ul>";

				while(has_sub_field('weight')): 

					echo "<liprint_slideshow>".get_sub_field('value')." ".get_sub_field('mesure')."</li>";

				endwhile;

				echo "</ul>";

	 endif;
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_weight', 15 );
add_action( 'woocommerce_product_tab_panels', 'get_related_producers', 30 );
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30 );
//remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_attributes_panel', 20 );

add_filter('loop_shop_per_page', create_function('$cols', 'return 24;'));

function get_formatted_line_subtotal_custom($order,$item ) {
	$subtotal = 0;
	$subtotal = woocommerce_price( $order->get_line_subtotal( $item, true ) );
	return apply_filters( 'woocommerce_order_formatted_line_subtotal', $subtotal, $item, $order );
}

function get_order_item_totals_custom($order) {
	global $woocommerce;

	$total_rows = array();

	if ( $subtotal = get_subtotal_to_display_custom($order) )
		$total_rows['cart_subtotal'] = array(
			'label' => __( 'Cart Subtotal:', TACATI_TD ),
			'value'	=> $subtotal
		);

	if ( $order->get_cart_discount() > 0 )
		$total_rows['cart_discount'] = array(
			'label' => __( 'Cart Discount:', TACATI_TD ),
			'value'	=> '-' . $order>get_cart_discount_to_display()
		);

	if ( $order->get_shipping_method() )
		$total_rows['shipping'] = array(
			'label' => __( 'Shipping:', TACATI_TD ),
			'value'	=> $order->get_shipping_to_display()
		);



	if ( $order->get_order_discount() > 0 )
		$total_rows['order_discount'] = array(
			'label' => __( 'Order Discount:', TACATI_TD ),
			'value'	=> '-' . $order->get_order_discount_to_display()
		);

	$total_rows['order_total'] = array(
		'label' => __( 'Order Total:', TACATI_TD ),
		'value'	=> $order->get_formatted_order_total()
	);

	return apply_filters( 'woocommerce_get_order_item_totals', $total_rows, $order );
}

function get_subtotal_to_display_custom( $order,$compound = false ) {
		global $woocommerce;
		$subtotal = 0;
		foreach ($order->get_items() as $item) :
			$subtotal += $order->get_line_subtotal( $item );
			$subtotal += $item['line_subtotal_tax'];
		endforeach;
		$subtotal = woocommerce_price( $subtotal );
		return apply_filters( 'woocommerce_order_subtotal_to_display', $subtotal, $compound, $order );
	}
	
function woocommerce_pip_order_items_table_custom( $order, $show_price = FALSE ) {

		$return = '';
		
		foreach($order->get_items() as $item) {
			
			$_product = $order->get_product_from_item( $item );
			
			$sku = $variation = '';
			
			$sku = $_product->get_sku();
			
			$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );					
			$variation = '<br/><small>' . $item_meta->display( TRUE, TRUE ) . '</small>';
			
			$return .= '<tr>
			  <td style="text-align:left; padding: 3px;">' . $sku . '</td>
				<td style="text-align:left; padding: 3px;">' . apply_filters('woocommerce_order_product_title', $item['name'], $_product) . $variation . '</td>
				<td style="text-align:left; padding: 3px;">'.$item['qty'].'</td>';
			if ($show_price) {	
			$return .= '<td style="text-align:left; padding: 3px;">';				
			$return .= woocommerce_price( $order->get_line_subtotal( $item,TRUE ));
					
			
			$return .= '	
				</td>';
		  }
			$return .= '</tr>';
			
		}	

		$return = apply_filters( 'woocommerce_pip_order_items_table', $return );

		return $return;	
		
	}
add_filter('jpeg_quality', function($arg){return 75;});

function get_noprofit_array(){
	global $noprofit_ar;
	
	$args = array( 
		'posts_per_page' => -1,
		'post_type'=>'noprofit' ,
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);


	$noprofit_posts_list = query_posts( $args );
	$noprofit_ar = array("lascio scegliere a tacati");
	foreach ($noprofit_posts_list as $noprofit){
	 $noprofit_ar[] = $noprofit->post_title;
	}
	wp_reset_query();
	
}
add_action( 'wp_loaded', 'get_noprofit_array' );

function get_press(){
	 if(get_field('press', 'option'))
	{
		echo '<ul class="press">';

		while(has_sub_field('press','option'))
		{
			echo '<li><a target="_blank" href="'.get_sub_field('title-press').'">'.get_sub_field('url-press').'</a></li>';
		}

		echo '</ul>';
	} 

}

/**
 * This code should be added to functions.php of your theme
 **/
add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');

function custom_default_catalog_orderby() {
	 return 'menu_order'; // Can also use title and price
}

