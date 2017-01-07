<div id="more">
<?php
$cat = get_the_category();
$catp = $cat[0]->category_parent; 
$class = get_term( $catp, 'category' );
if($catp==""){ $class = get_term( $cat[0], 'category' );}
$category = $class ->slug;
$args = array( 'posts_per_page' => 5, 'category_name' => $category, 'exclude'=> array(get_the_id()));
$myposts = get_posts( $args );

foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<div class="hh-post" style=" <?php if(has_post_thumbnail()){echo "background-image:url(";the_post_thumbnail_url('thumbnail'); echo");";} ?>">
    <a href="<?php echo get_permalink();?>" class="permalink"></a>
    <div class="hh-window" ><div class="post-type <?php $tag = get_the_tags(); echo $tag[0]->slug; ?>"><?php echo $tag[0]->name ?></div></div>
    <div class="hh-content">
        
         <h3><?php the_title(); ?></h3>
         <?php the_excerpt(); ?>
  </div><span class="fadetop"></span>
     </div>
<?php
endforeach; 
wp_reset_postdata();
?>
</div>
<div id="jump">
    <a href="#"> <i class="fa fa-step-backward fa-rotate-90" aria-hidden="true"></i></a>
    <a href="#share"><i class="fa fa-share-alt fa-lg"></i></a>
    <a href="#comments"><i class="fa fa-comments fa-lg"></i></a>
    <a href="#" id="jump-button"><i class="jump-icon"></i></a>
</div>