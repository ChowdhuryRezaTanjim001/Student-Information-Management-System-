<?php
	require"function.php";
	$user = new dbms();

	$qry=$user->delete_faculty($_GET['id']);
	if($qry)
	{
		echo"Delete Successful".'</br><a href = "view.php#faculty_list">Back And View</a>';
	}
?>

