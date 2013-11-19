<?php

function setPostViews ( $postID )
{
	$count_key = 'post_views_count';
	$count = get_post_meta ( $postID, $count_key, true );
	if ( $count == '' )
	{
		$count = 0;
		delete_post_meta ( $postID, $count_key );
		add_post_meta ( $postID, $count_key, '0' );
	}
	else
	{
		$count++;
		update_post_meta ( $postID, $count_key, $count );
	}
}

function getMostViewedPosts ()
{
	query_posts ( 'meta_key=post_views_count&orderby=post_views_count&order=DESC' );
	if ( have_posts () ) {
		while ( have_posts() ) {
			the_post ();
			?>
			<li><a href="<?php the_permalink () ?>"><?php the_title () ?></a></li>
			<?php
		}
	}

	wp_reset_query ();
}

?>