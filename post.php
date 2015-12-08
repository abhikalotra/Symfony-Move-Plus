<?php

require_once('blog/wp-blog-header.php');    
?>
<div style="width:800px;margin:10px auto;">

<?php


$args = array( 'posts_per_page' => 5, 'category_name' => 'Moving' );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post );
	if ( has_post_thumbnail() ) {
	  the_post_thumbnail('medium');
  
} 
 ?>
	 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_excerpt(); ?></p>
<?php endforeach; 
wp_reset_postdata();?>


</div>