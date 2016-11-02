<?php 
$count = 0;

if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
    <?php if($count == 0){echo "<div class='row'>";}?>
	<div class="post small one-third column <?php $cat = get_the_category(); $catp = $cat[0]->category_parent; $catclass = get_term( $catp, 'category' ); echo $catclass->slug; ?>">
    <a href="<?php echo get_permalink();?>" class="permalink"></a>
    
    <div class="image" style=" <?php if(has_post_thumbnail()){echo "background-image:url(";the_post_thumbnail_url('thumbnail'); echo");";} ?>"> <div class="post-type  <?php $tag = get_the_tags(); echo $tag[0]->slug; ?>"><?php echo $tag[0]->name ?></div></div><div class="content">
   
    <div class="bottom-aligner"></div><div class="bottom-content">
		<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
</div>
	</div>
    <div class="post-author">
     <span class="bold"><?php the_author(); ?></span> <span class="italic"><?php the_date( 'd/m/Y', '', '', true ); ?> </span>
     </div>
     </div>
<?php $count++; if($count==3){echo "</div>"; $count = 0;}?>
	<?php endwhile; 
	wp_reset_postdata();
	echo "</div>";?>
<?php endif; ?>