     <?php get_header(); ?>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="row"> <div class="one-row">
      
      <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
      
      </div></div></div>
  <div class="container"><?php if (have_posts()) : while (have_posts()) : the_post();?>
  <div id="user" class="row">
      <div class="column one-half">
         <span class="category"><a href="<?php 
                  $cat = get_the_category();
                  echo esc_url(get_category_link($cat[0]->term_id)); 
                  ?>"><?php  echo esc_html($cat[0]->name);  ?></a></span> 
          <span class="post-type <?php $tag = get_the_tags(); echo $tag[0]->slug; ?>"><?php the_tags("","",""); ?></span></div>
      <div class="column one-half">Por 
          <span class="author-image">
              <?php $author = get_the_author_meta( 'ID' ); 
          echo get_avatar( $author,50,$author); ?>
      </span>
        <span class="author"><?php the_author(); ?></span>
      <span class="date"><?php the_date( 'd/m/Y', '', '', true ); ?></span>
      </div>
        </div>  
  <div class="row">
  <div id="main-column" class="two-thirds column">
    <div class="page-header u-cf">
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
  
<div id="side-column" class="one-third column related <?php 
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

  
 
