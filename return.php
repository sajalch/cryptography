<?php
// $_POST['mainVal']="balloon";
// $_POST['key']="monarchy";
// $_POST['algo']=2;
// $_POST['EncDec']=1;
 if(isset($_POST['EncDec'])&&isset($_POST['algo'])&&isset($_POST['mainVal'])&&isset($_POST['key']))
 {
 	if($_POST['algo']==1)
	{
		include 'caesar.php';
	}
	if($_POST['algo']==2)
	{
		include 'playfair.php';
	}
	if($_POST['algo']==3)
	{
		include 'des.php';
	}

 }
?>