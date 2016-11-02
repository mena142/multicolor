     <?php get_header(); ?>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
  <div class="row">
  <div class="two-thirds column">
   <?php if (have_posts()) : while (have_posts()) : the_post();?>
   <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
    <div class="page-header u-cf">
     <h1><?php the_title();?></h1>
  </div>
   <div class="page-content">     
       <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>
</div>
  
<div class="one-third column related">
<?php if ( dynamic_sidebar('sidebar') ) : else : endif; ?>
</div>
</div>
</div>
<?php get_footer();?>

  
 
