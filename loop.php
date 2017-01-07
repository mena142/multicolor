<?php 
$count = 0;

if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
    <?php if($count == 0){echo "<div class='row'>";}?>
	<div class="post small one-third column <?php 
                $cat = get_the_category();
                $catp = $cat[0]->category_parent; 
                $class = get_term( $catp, 'category' );
                if($catp==""){ $class = get_term( $cat[0], 'category' );}
               
                echo $class->slug;
                echo " ";
                $tag = get_the_tags(); 
                echo $tag[0]->slug; 
                
                ?> " style=" <?php if(has_post_thumbnail()){echo "background-image:url(";the_post_thumbnail_url('medium'); echo");";} ?>">
    <a href="<?php echo get_permalink();?>" class="permalink"></a>
    <span class="fadetop"></span>
    <div class="window"> <div class="post-type  "><?php echo $tag[0]->name ?></div></div><div class="content">
   
    <div class="bottom-aligner"></div><div class="bottom-content">
		<h3><?php the_title(); ?></h3>
<p><?php the_excerpt(); ?></p>
</div>
	</div>
    <div class="post-author">
     <span class="bold"><?php the_author(); ?></span> <span class="italic">
        <?php
        echo get_the_date('d/m/Y');
        //echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' );
       // the_date( 'd/m/Y', '', '', true ); 
        ?> </span>
     </div>
     </div>
<?php $count++; if($count==3){echo "</div>"; $count = 0;}?>
	<?php endwhile; 
	wp_reset_postdata();
	echo "</div>";?>
<?php endif; ?>