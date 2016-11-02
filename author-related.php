 <?php
$args = array( 'posts_per_page' => 3, 'author' => $author);
$myposts = get_posts( $args );

echo "<ul class='arel'>";

foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li class="<?php 
               
               $acat = get_the_category();
                $acatp = $acat[0]->category_parent; 
                $aclass = get_term( $acatp, 'category' );
                if($acatp==""){ $aclass = get_term( $acat[0], 'category' );}
               
                echo $aclass->slug;
                echo " ";
                $atag = get_the_tags(); 
                echo $atag[0]->slug; 
                              
               ?>"> <a href="<?php echo get_permalink();?>" class="permalink"></a><div class="ap-image" style=" <?php if(has_post_thumbnail()){echo "background-image:url(";the_post_thumbnail_url('thumbnail'); echo");";} ?>"><div class="post-type <?php $tag = get_the_tags(); echo $tag[0]->slug; ?>"><?php echo $tag[0]->name ?>&nbsp;</div></div><div class="content"><h3><?php the_title(); ?></h3></div>
   
     </li>
<?php
endforeach; 
wp_reset_postdata();
echo "</ul>";
?>