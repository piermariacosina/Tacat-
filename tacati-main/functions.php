<?php

add_image_size( 'slideshow', '960', '288', true );

if ( !defined( TACATI_TD ) )
{
	define( 'TACATI_TD', 'tacati_textdomain' );
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
		$version = '0.1';
		
		wp_register_style( 'screen',  get_theme_root_uri() . '/css/screen.css', array(), $version, 'screen, projection' );
		
		wp_register_style( 'print',  get_theme_root_uri() . '/css/print.css', array(), $version, 'print' );
		wp_register_style( 'flexslidercss',  get_theme_root_uri() . '/css/flexslider.css', array(), $version, 'screen, projection' );
		wp_register_style( 'bootstrapcss',  get_theme_root_uri() . '/css/bootstrap.css', array(), $version, 'screen, projection' );
		wp_register_style( 'home',  get_theme_root_uri() . '/css/home.css', array(), $version, 'screen, projection' );
		
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
		if(is_page( 532 )):
			wp_enqueue_style( 'home' );
		endif;
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
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_content()?>
					<a href="http://<?php the_field("link"); ?>"><?php the_field("link_text"); ?></a>
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
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php if(get_field('type')):?>
						<h5 class="entry-title"><?php the_field('type'); ?></h5>
					<?php endif; ?>
					<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail('thumbnail');
							}  ?>
					<?php the_excerpt()?>
					
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
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<p class="flex-caption"><?php echo $image['caption']; ?></p>
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
							<?php if(!is_page( 532 )){
								echo '<div class="background"></div>';
							}?>
							<div class="content">
								<h1><?php echo $image['titolo']; ?></h1>
								<h5><?php echo $image['sottotitolo']; ?></h5>
								<?php echo $image['text']; ?>
							</div>
							</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if(is_page( 532 )){
				 get_shops("Asti","left");
				 get_shops("Torino","right"); 
			}?>
			
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
				<ul>
				<?php foreach( $producers as $producer): ?>
					<li>
						<a href="<?php echo get_permalink($producer->ID); ?>"><?php echo get_the_title($producer->ID); ?></a>		
					</li>
				<?php endforeach; ?>
				</ul>
		<?php endif;
	}
	
	add_action('related_producers', 'get_related_producers');
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
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_content()?>
					<a href="<?php the_permalink(); ?>">vai -></a>
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
	}
}

add_action('manage_shop_order_posts_custom_column', 'woocommerce_custom_order_columns2', 2);


remove_action( 'manage_shop_order_posts_custom_column','woocommerce_custom_order_columns',2 );

/**
 * Add the field to the checkout
 **/
add_action('woocommerce_after_order_notes', 'noprofit_field');

function noprofit_field( $checkout ) {

	echo '<div id="noprofit_field"><h3>'.__('noprofit', TACATI_TD).'</h3>';


	$args = array( 
			'posts_per_page' => 20,
			'post_type'=>'noprofit' ,
			'post_status'=>'publish',
			'order'=>'ASC',
			'orderby'=>'title'
			);
	
	
		$noprofit_posts_list = query_posts( $args );
		
			
		// Reset Query
		wp_reset_query();

	
	woocommerce_form_field( 'noprofit', array(
		'type'          => 'select',
		'class'         => array('onlus_field form-row-wide'),
		'label'         => __('Choose a NoProfit', TACATI_TD),
		'placeholder'       => __('Enter something', TACATI_TD),
		'options' => $noprofit_posts_list->post_title
		), $checkout->get_value( 'noprofit' ));

	echo '</div>';
}
/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
	global $woocommerce;

	// Check if set, if its not set add an error.
	if (!$_POST['noprofit']){
		 $woocommerce->add_error( __('Please enter something into this new shiny field.', TACATI_TD) );
	 }
}

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
	if ($_POST['noprofit']) {
		update_post_meta( $order_id, 'noprofit', esc_attr($_POST['noprofit']));
	}
}

function add_registration(){
	echo '<a href="/mio-profilo">Registrati</a>'; 
}

add_action('woocommerce_login_widget_logged_out_after_form', 'add_registration' );

add_filter('jpeg_quality', function($arg){return 75;});

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

//SHops
//SHOPS
if ( !function_exists( 'shops_register' ) ) :
function shops_register() {

	$labels = array(
		'name' => _x('Shops', 'post type general name',TACATI_TD),
		'singular_name' => _x('Shop', 'post type singular name',TACATI_TD),
		'add_new' => _x('Add New Shop', 'Gallery item',TACATI_TD),
		'add_new_item' => __('Add New Shop Item',TACATI_TD),
		'edit_item' => __('Edit Shop Item',TACATI_TD),
		'new_item' => __('New Shop Item',TACATI_TD),
		'view_item' => __('View Shop Item',TACATI_TD),
		'search_items' => __('Search Shops',TACATI_TD),
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

	register_post_type( 'shop' , $args );
	}

add_action('init', 'shops_register');
endif;


if ( !function_exists( 'get_shops' ) ) :
function get_shops( $citta, $position ){

	$args = array( 
		'posts_per_page' => -1,
		'post_type'=>'shop' ,
		'post_status'=>'publish',
		'order'=>'ASC',
		'orderby'=>'title'
		);

	query_posts( $args );
		echo '<div id="'.$position.'">';
		
	// The Loop
		while (have_posts() ) : the_post();?>
		
			<?php if ( get_field("citta") == $citta ): ?>
				<h1><?php the_field("citta"); ?></h1>
			
				<div class="stripes"></div>
			
				<div class="box">
					
					<div class="foto"><?php the_post_thumbnail(array(66,66) ); ?></div>
					<h2><?php the_title(); ?> </h2>
					<p><?php the_content(); ?></p>
					<h4><?php the_field("specialita"); ?></h4>
					
					
					<h3><?php the_field("offerta"); ?></h3>
					<nav id="access" role="navigation" class="main-access">
						<div class="bottone_rosso">
							<a href="<?php the_field("link");?>">Fai la spesa!</a>
						</div>
					</nav>
					<h5><?php the_field("location"); ?></h5>
					<div class="stripes"></div>
				</div>
			<?php endif;
		endwhile;	
		echo "</div>";
	// Reset Query
	wp_reset_query();
}
endif;
