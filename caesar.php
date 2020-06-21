<?php

	$text=strtolower(trim($_POST['mainVal']));
	$key=strtolower(trim($_POST['key']));
	
	function caesar_encrypt($str, $key) {
    $etext = "";
    for ($i = 0; $i < strlen($str); $i++) 
				{
				    $etext = $etext.chr((ord($str[$i])-97 + 
						ord($key)-97) % 26 + 97);
				}
    return $etext;
	}
	function caesar_decrypt($str, $key) {
	    $dtext = "";
				for ($i = 0; $i < strlen($str); $i++) 
				{ 
			      $mod=ord($str[$i]) - ord($key);
			      while($mod<0)
			      {
			        $mod=$mod+26;
			      }
					$dtext =$dtext.chr($mod +97); 
			      
				} 
	    return $dtext;
	}

	
	if($_POST['EncDec']==1)  //Encrypt
	{
		echo "<span><b>Encrypted Text:</b>&#160;</span><span>".caesar_encrypt($text,$key)."</span>";
	}	
	if($_POST['EncDec']==0)
	{
		echo "<span><b>Decrypted Text:</b>&#160;</span><span>".caesar_decrypt($text,$key)."</span>";
	}
	




?>