<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<?php
 global $wpdb;
 $querystr = "
   SELECT * FROM wp_posts
LEFT JOIN samuel ON wp_posts.ID = samuel.post_id
ORDER BY samuel.up DESC
";

$p = $wpdb->get_results($querystr);
echo "<pre>"; 
//print_r($p);
echo "</pre>"; 
?> 
<div id="container">
			<div id="content" role="main">
			
<?php foreach ($p as $v) : ?>
 <div class="post">
 
	<h2><?php echo substr($v->post_title, 0, 40); ?></h2>
	
	<div class="entry">
   <?php echo substr($v->post_content, 0, 140); ?>
</div>
	

<div class="ratings">

<div class='up'>Vote Up - <a href="" title="<?php echo $v->ID; ?>" class="vote rating-icon rating-up-inactive" id="up-<?php echo $v->ID; ?>" name="up"><?php echo $v->up; ?></a></div>

<div class='down'>Vote Down - <a href="" title="<?php echo $v->ID; ?>" class="vote rating-icon rating-down-inactive" id="down-<?php echo $v->ID; ?>" name="down"><?php echo $v->down; ?></a></div>

<div class="vmessage-<?php echo $v->ID; ?> vmessagetest"></div>
	
</div>
<div class="clear"></div>

<?php
	endforeach;
?>

</div><!-- #content -->
</div><!-- #container -->	 
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>
