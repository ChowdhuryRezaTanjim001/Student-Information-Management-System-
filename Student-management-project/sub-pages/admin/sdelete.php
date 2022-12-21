<?php
	require"function.php";
	$user = new dbms();

	$qry=$user->delete_student($_GET['id']);
	if($qry)
	{
		echo"Delete Successful".'</br><a href = "view.php#student_list">Back And View</a>';
	}
?>

