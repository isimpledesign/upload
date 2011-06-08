<?php
/**
 * Template Name: up
 */
 
global $wpdb, $current_user;

get_currentuserinfo();


$ip=$_SERVER['REMOTE_ADDR'];
 

setcookie("user", $_POST['id'], time()+3600); 

if($_COOKIE["user"] == $_POST['id'])
{

$voted = "you have already voted, you can vote again in one hour from now";


}
else
{
$wpdb->query("UPDATE samuel set up=up+1 WHERE post_id = ".$_POST['id']."");
}


$votes = $wpdb->get_results("SELECT * FROM samuel WHERE post_id = ".$_POST['id']."");

foreach ($votes as $v) :

	$up = $v->up;
	
endforeach;

$json = array(
			post_id => $_POST['id'],
            id => $up,
            voted => $voted,
			ud => $_POST['ud']
);  
echo json_encode($json);

?>