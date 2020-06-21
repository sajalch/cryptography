<?php
// $_POST['mainVal']="encrypt";
// $_POST['key']="mokkel";

	include 'vendor/autoload.php';
    $des = new \phpseclib\Crypt\DES();  //Library  https://github.com/phpseclib/mcrypt_compat
	$key=strtolower(trim($_POST['key']));
    $des->setKey($key);
	$ct='';
	$pt='';


//Output
	
		if($_POST['EncDec']==1)  //Encrypt
		{
			$text=strtolower(trim($_POST['mainVal']));
			//Encryption
			 $ciphertext=$des->encrypt($text);
			 // echo "<br>";
				for ($i = 0; $i < strlen($ciphertext); $i++) {
					//echo ord($ciphertext[$i])." ";
			        $ct.=(dechex(ord($ciphertext[$i])))." ";
			     }
			echo "<span><b>Encrypted Text:</b>&#160;</span><span>".$ct."</span>";
		}	
		if($_POST['EncDec']==0)
		{
			$ct=trim($_POST['mainVal'])." ";
			$data=[];
			$append='';
			$j=0;
			for ($i = 0; $i < strlen($ct); $i++) {
				    if($ct[$i]!=' ' && $ct[$i]!='\0')
				    {
				    	$append.=$ct[$i];
				    }
				    else
				    {
				    	$data[$j]=$append;
				    	$j+=1;
				    	$append='';
				    }
			        
			     }
			for ($i = 0; $i < $j; $i++) {
					$pt.=chr(hexdec($data[$i]));
			}
			//echo $pt;
			  echo "<span><b>Decrypted Text:</b>&#160;</span><span>".$des->decrypt($pt)."</span>";
		}

?>