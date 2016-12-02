<?php

function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata">
        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s - %2$s'), get_comment_date('d/m/Y'),  get_comment_time() ); ?><?php edit_comment_link( __( '<i class="fa fa-pencil" aria-hidden="true"></i>' ), '  ', '' );
        ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }

/*SIDEBARS & WIDGETS*/
function arphabet_widgets_init() {
	register_sidebar( array(
		'name' => 'sidebar',
		'id' => 'sidebar',
	) );	
}


/*ENABLE THUMBNAILS*/
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}

/*EXCERPT LENGHT*/
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*COMMENT FORM*/
function remove_comment_fields($fields) {
    unset($fields['url']);
	unset($fields['email']);
    return $fields;
}

/* remove/change 'says' in comments // alchymyth 2011 */
class Comment_Says_Custom_Text_Wrangler {
	function comment_says_text($translation, $text, $domain) {
	$new_says = ''; //whatever you want to have instead of 'says' in comments
    $translations = &get_translations_for_domain( $domain );
    if ( $text == '<cite class="fn">%s</cite> <span class="says">says:</span>' ) {
	   if($new_says) $new_says = ' '.$new_says; //compensate for the space character
       return $translations->translate( '<cite class="fn">%s</cite><span class="says">'.$new_says.':</span>' );
     } else {
    return $translation; // standard text
	 }  
	}
}
add_filter('gettext', array('Comment_Says_Custom_Text_Wrangler', 'comment_says_text'), 10, 4);
//add_filter('comment_form_default_fields','remove_comment_fields');

/*CSS ENQUEUE */

/*WP SCRIPT ENQUEUE*/
if (!is_admin()){add_action("init", "js_enqueue");}

function js_enqueue() {
	/*JQUERY*/
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
   /*SCRIPTS*/
   wp_register_script('scripts', get_template_directory_uri() ."/js/scripts.js", false, null);
   wp_enqueue_script('scripts');
}

/*INFINITE SCROLL*/
function wp_infinitepaginate(){ 
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = get_option('posts_per_page');
	$cat = "";
	$cat = $_POST['category'];
 
    # Load the posts
    query_posts(array('paged' => $paged, 'cat' => $cat, 'posts_per_page' => 3)); 
    get_template_part( $loopFile );
 
    exit;
}



function open_graph_metas() {
    global $post;
    setup_postdata($post);
   $text = apply_filters('get_the_excerpt', get_post_field('post_excerpt', $post->ID));
    if ( !is_singular()) //if it is not a post or a page
        return;
    echo '<meta property="og:title" content="'.get_the_title($post -> ID).'"/>';
    echo '<meta property="og:description" content="'.$text.'"/>';
    echo '<meta property="og:url" content="'.get_permalink($post -> ID).'"/>';
    if(!has_post_thumbnail( $post->ID )) {  $default_image="http://multicolor.arturomena.com/wp-content/uploads/2016/09/1.jpg"; 
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
    ";
}
add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in
add_action( 'wp_head', 'open_graph_metas', 5 );
add_action( 'widgets_init', 'arphabet_widgets_init' );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
?>