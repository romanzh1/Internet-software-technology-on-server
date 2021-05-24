<?PHP
	$myFileName="counter.txt"; 
	$myF=fopen($myFileName, "r");
	$counter=fread($myF,filesize("counter.txt"));
	$counter++;
	fclose($myF);
	$myF=fopen($myFileName,"w");
	fwrite($myF,$counter);
	fclose($myF);
	echo $counter;
?>