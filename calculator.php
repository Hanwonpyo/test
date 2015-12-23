<?
	echo "equation: {$_POST['input']} <br>"; 
	$string=$_POST['input'];
	$num = preg_replace("/[^0-9]*/s", " ", $string); 
	function multiexplode ($delimiters,$string) {
     	 $ready = str_replace($delimiters, $delimiters[0], $string);
   		 $launch = explode($delimiters[0], $ready);
   		 return  $launch;
	}

	$num = multiexplode(array("+","-","/","*"),$string);

	$j=0;
	for($i=0;$i<strlen($string);$i++) {
		if($string[$i]=='+') {
			$num[$j+1]=$num[$j]+$num[$j+1];
			$j++;
		}
		else if($string[$i]=='-') {
			$num[$j+1]=$num[$j]-$num[$j+1];
			$j++;
		}
		else if($string[$i]=='*') {
			$num[$j+1]=$num[$j]*$num[$j+1];
			$j++;
		}
		else if($string[$i]=='/') {
			$num[$j+1]=$num[$j]/$num[$j+1];
			$j++;
		}
		else
			continue;
	}

	echo "result : {$num[$j]} <br>";

?>
