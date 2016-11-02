     <?php get_header(); ?>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="row"> <div class="one-row"><div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div></div></div>
  <div class="container"><?php if (have_posts()) : while (have_posts()) : the_post();?>
  
  <div class="row">
  <div class="two-thirds column">
    <div class="page-header u-cf">
      <div id="user" class="row">
      <span class="author-image" style="background:url()">
          <?php $author = get_the_author_meta( 'ID' ); 
          echo get_avatar( $author,60,$author); ?>
      </span>
      <div class="column one-third">
      <span class="<?php $tag = get_the_tags(); echo $tag[0]->slug; ?>"><?php the_tags("","",""); ?></span>
                 
                 <h5><?php the_author(); ?></h5></div>
                 
                 <span class="one-third column"> <a href="<?php 
                  $cat = get_the_category();
                  echo esc_url(get_category_link($cat[0]->term_id)); 
                  ?>"><?php  echo esc_html($cat[0]->name);  ?></a>
              <h5><?php the_date( 'd/m/Y', '', '', true ); ?></h5>  </span>
        </div>  
         <h1><?php the_title();?></h1>         
  </div>
   <div class="page-content">     
       <?php the_content(); ?>
      <div id="share"></div>
    </div>
    <?php endwhile; endif; ?>
    <div class="author-related">
	<h5>DEL AUTOR</h5>
	<?php require "author-related.php"; ?></div>


</div>
  
<div class="one-third column related <?php 
                $cat = get_the_category();
                $catp = $cat[0]->category_parent; 
                $class = get_term( $catp, 'category' );
                if($catp==""){ $class = get_term( $cat[0], 'category' );}
                echo $class->slug;
                echo " ";
                $tag = get_the_tags(); 
                echo $tag[0]->slug; 
            ?>">
<h5>MAS IDEAS</h5>

<?php require "single-sidebar.php"; if ( dynamic_sidebar('sidebar') ) : else : endif; ?>
</div>
</div>
<div class="row" id="comments">
<div class="comment-divider"><i class="fa fa-comments fa-lg"></i></div>
    <?php comments_template(); ?>
</div>
</div>
<?php get_footer();?>

  
 
