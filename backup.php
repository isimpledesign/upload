<?php
$date = date("F-j-Y-g-ia");

if(exec("cd ".$_SERVER['DOCUMENT_ROOT'].";tar -cvpzf backup-$date.tar ".$_SERVER['DOCUMENT_ROOT']."")) {
	
echo "Backup Completbbbe ;)";	 
 	
}  

?>