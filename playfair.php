<?php

	// Function to generate the 5x5 key square 
	function generateKeyTable($key, $ks) 
	{ 
		//int i, j, k, flag = 0, *dicty; 

		// a 26 character hashmap 
		// to store count of the alphabet 
		$dicty =array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$keyT= [[],[],[],[],[]]; 
		for ($i = 0; $i < $ks; $i++) { 
			if ($key[$i] != 'j') 
				$dicty[ord($key[$i]) - 97] = 2; 
		} 

		$dicty[ord('j') - 97] = 1; 

		$i = 0; 
		$j = 0; 

		for ($k = 0; $k < $ks; $k++) { 
			if ($dicty[ord($key[$k]) - 97] == 2) { 
				$dicty[ord($key[$k]) - 97] -= 1; 
				$keyT[$i][$j] = $key[$k]; 
				$j++; 
				if ($j == 5) { 
					$i++; 
					$j = 0; 
				} 
			} 
		} 
	//print_r($dicty);
		for ($k = 0; $k < 26; $k++) { 
			if ($dicty[$k] == 0) { 
				$keyT[$i][$j] = chr($k + 97); 
				$j++; 
				if ($j == 5) { 
					$i++; 
					$j = 0; 
				} 
			} 
		} 
		return $keyT;
	} 

	// Function to search for the characters of a digraph 
	// in the key square and return their position 
	function search($keyT, $a, $b) 
	{   $arr=array(0,0,0,0);
		//int i, j; 
	//print_r($keyT);exit;
		//  for ($i = 0; $i < 5; $i++) 
		// 	{
		// 		for ($j = 0; $j < 5; $j++)
		// 		{
		// 			echo $keyT[$i][$j]." ";
		// 		}
		// 	echo "<br>";
		// }
		if ($a == 'j') 
			$a = 'i'; 
		else if ($b == 'j') 
			$b = 'i'; 

		for ($i = 0; $i < 5; $i++) { 

			for ($j = 0; $j < 5; $j++) { 

				if ($keyT[$i][$j] == $a) { 
					$arr[0] = $i; 
					$arr[1] = $j; 
				} 
				else if ($keyT[$i][$j] == $b) { 
					$arr[2] = $i; 
					$arr[3] = $j; 
				} 
			} 
		} 
		return $arr;
	} 

	// Function to find the modulus with 5 
	function mod5(int $a) 
	{ $mod=($a % 5);
		if($mod>-1)
			return ($a % 5); 
		else
		{
			while ($mod<0) {
				$mod=$mod+5;
			}
			return $mod;
		}
	} 


	// Function for performing the encryption 
	function encrypt($str, $keyT, $ps) 
	{   
		//int i, 
		 $a=[];//array(0,0,0,0);//[4]; 
	//echo $str."<br>";

		for ($i = 0; $i < $ps; $i += 2) { 
			//echo $str[$i].$str[$i + 1]." ";
			$a=search($keyT, $str[$i], $str[$i + 1]); 

			if ($a[0] == $a[2]) { 
				$str[$i] = $keyT[$a[0]][mod5($a[1] + 1)]; 
				$str[$i + 1] = $keyT[$a[0]][mod5($a[3] + 1)]; 
			} 
			else if ($a[1] == $a[3]) { 
				$str[$i] = $keyT[mod5($a[0] + 1)][$a[1]]; 
				$str[$i + 1] = $keyT[mod5($a[2] + 1)][$a[1]]; 
			} 
			else { 
				$str[$i] = $keyT[$a[0]][$a[3]]; 
				$str[$i + 1] = $keyT[$a[2]][$a[1]]; 
			} 
			
		} 
	return $str;
	} 
	function decrypt($str, $keyT, $ps) 
	{   
		//int i, 
		 $a=[];//array(0,0,0,0);//[4]; 
	//echo $cstr."<br>";

		for ($i = 0; $i <= $ps; $i += 2) { 
			//echo $str[$i].$str[$i + 1]." ";
			if($i + 1>=$ps)
				{break;}
			$a=search($keyT, $str[$i], $str[$i + 1]); 


			if ($a[0] == $a[2]) { 
				$str[$i] = $keyT[$a[0]][mod5($a[1] - 1)]; 
				$str[$i + 1] = $keyT[$a[0]][mod5($a[3] - 1)]; 
			} 
			else if ($a[1] == $a[3]) { 
				$str[$i] = $keyT[mod5($a[0] - 1)][$a[1]]; 
				$str[$i + 1] = $keyT[mod5($a[2] - 1)][$a[1]]; 
			} 
			else { 
				$str[$i] = $keyT[$a[0]][$a[3]]; 
				$str[$i + 1] = $keyT[$a[2]][$a[1]]; 
			} 
			
		} 
	return $str;
	} 

	function case_space_merge($s)
	{
	    $k='';
	    for($i=0;$i<strlen($s);$i++)
	    {
	        if($s[$i]!=' ')
	        {
	           $k.=strtolower($s[$i]);    //to lowercase...
	        }
	    }
	    return $k;
	}
	function removeduplicates($s)
	{
	 
	 //map<char,bool> exist;  //php associative array
	$exist=array('a'=>false,'b'=>false,'c'=>false,'d'=>false,
				'e'=>false,'f'=>false,'g'=>false,'h'=>false,
				'i'=>false,'j'=>false,'k'=>false,'l'=>false,
				'm'=>false,'n'=>false,'o'=>false,'p'=>false,
				'q'=>false,'r'=>false,'s'=>false,'t'=>false,
				'u'=>false,'v'=>false,'w'=>false,'x'=>false,
				'y'=>false,'z'=>false
				);
	 $k='';
	 for($i=0;$i<strlen($s);$i++)
	 {
	    if(!$exist[$s[$i]])
	        {
	            $exist[$s[$i]]=true;
	            $k.=strtolower($s[$i]);
	        }
	 }
	  return $k;
	}

	function prepareString($s)
	{
	    $n=strlen($s);
	    $k='';
	  for($i=0;$i<$n;$i++)
	    {

	        if($i+1<$n && $s[$i]==$s[$i+1])
	        {
	            $k.=$s[$i];
	            $k.='x';
	        }
	        else
	        {$k.=$s[$i];}
	    }
	   if(strlen($k)%2!=0)
	   {
	       $k.='x';
	   }
	    return $k;
	}

	function UnprepareString($s)  //s=helxlo
	{
	    $n=strlen($s);
	   $k='';
	  for($i=0;$i<$n;$i++)
	    {

	        if($i+2<$n && $s[$i+1]=='x' &&$s[$i]==$s[$i+2])
	        {
	            $k.=$s[$i];
	            $i+=2;
	            $k.=$s[$i];

	        }
	        else
	        {$k.=$s[$i];}
	    }
	    $m=strlen($k);
	    $s='';
	    for($i=0;$i<$m;$i++)
	    {
	        if($i==$m-1 && $k[$i]=='x')
	        {
	            break;
	        }
	        if($i+2<$m && $k[$i+1]=='x' &&$k[$i]==$k[$i+2])
	        {
	            $s.=$k[$i];
	            $i+=2;
	            $s.=$k[$i];
	        }
	        else
	        {$s.=$k[$i];}
	    }

	    return $s;
	}

	///////////////////////////////////////////////////////


	  if($_POST['EncDec']==1)  //Encrypt
	  {
		$str=strtolower(trim($_POST['mainVal']));$ec="";
	  }
	  if($_POST['EncDec']==0)  //Decrypt
	  {
		$str="";$ec=strtolower(trim($_POST['mainVal']));
	  }
		$key=strtolower(trim($_POST['key']));

		 	$key=case_space_merge(removeduplicates($key));    
			// Key 
			$ks = strlen(strtolower($key)); 
			// Plaintext 
			$str=prepareString($str);
			$ps = strlen(strtolower($str));  	
			//Key table
			$keyT= [[],[],[],[],[]];
			$keyT=generateKeyTable($key, $ks);

		//View key
	echo "<br><span><b>key Matrix:</b>&#160;</span><span>";
			echo "<table><tbody>";
			 for ($i = 0; $i < 5; $i++) 
				{echo "<tr>";
					for ($j = 0; $j < 5; $j++)
					{
						echo "<td>".$keyT[$i][$j]."</td>";
					}
				echo "</tr>";
				//echo "<br>";
			}
			echo "</tbody></table>";
			 //$ps = strlen(strtolower($str));
			
		echo "</span>";
		echo "<style>table, th, td {  border: 1px solid black;}</style>";


		
		  if($_POST['EncDec']==1)
		  {
			echo "<span><b>Encrypted Text:</b>&#160;</span><span>".$ec=encrypt($str, $keyT, $ps)."</span>";
		  }
		  if($_POST['EncDec']==0)
		  {     
		  	 $cs=strlen($ec);	  
				echo "<span><b>Decrypted Text:</b>&#160;</span><span>".$dc=UnprepareString(decrypt($ec, $keyT, $cs))."</span>";
		  }

	 








?>