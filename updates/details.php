<?php
        $url='http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/'.$_GET["id"];
		$strin=strip_tags(file_get_contents($url));
		$str2=trim($strin);
	  /*  for($i=0;$i<count($arr);$i++){
		
		}*/
		/*print_r($arr);*/
		$arr=str_split($str2);
	
		$data="";
		$str3;
		$s=0;

		while($arr[$s]!='('){
			$str3[$s]=$arr[$s];	
			$s++;

		}
		$s=count($str3)-1;
		$aula="";
		while($arr[$s]!=':'){
			$aula.=$str3[$s];	
			$s--;
		}
		echo "<br>".strrev($aula);

?>