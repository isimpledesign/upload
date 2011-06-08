<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			
			
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <div class="post">
 
 
  <?php
  
global $wpdb, $current_user;
$votes = $mylink = $wpdb->get_row("SELECT * FROM samuel WHERE post_id = ".get_the_ID()."");
print_r($votes);

$ip=$_SERVER['REMOTE_ADDR']; 

echo $ip;

?>
<?php 
 
 global $wpdb, $current_user;
 
      get_currentuserinfo();

	$wpdb->insert( 'samuel', 
		array( 'user_id' => $current_user->ID,
			'post_id' => get_the_ID(),
			'up' => 2,
			'down' => 1), 
		array( '%d', '%d', '%d', '%d' ) );
 
 
 
 ?>

 <div class="rating-widget">
		
 <div class='up'><a href="" class="vote rating-icon rating-up-inactive" id="<?php echo the_ID(); ?>" name="up"><?php echo $up; ?></a></div>

<div class='down'><a href="" class="vote rating-icon rating-down-inactive" id="<?php echo the_ID(); ?>" name="down"><?php echo $down; ?></a></div>

	</div>
 <!-- Display the Title as a link to the Post's permalink. -->
 <h2><?php the_ID(); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
 
  <div class="entry">
    <?php the_content(); ?>
  </div>

  <p class="postmetadata">Posted in <?php the_category(', '); ?></p>
 </div> <!-- closes the first div box -->

 

 <?php endwhile; else: ?>
 <p>Sorry, no posts matched your criteria.</p>
 <?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
