<?php
        $url='http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/'.$_GET["id"];
		$strin=strip_tags(file_get_contents($url));
		$str2=trim($strin);
	  /*  for($i=0;$i<count($arr);$i++){
		
		}*/
		/*print_r($arr);*/
		$arr=str_split($str2);
	
		$data="";
		for($i=60;$i<70;$i++){
			$data.=$arr[$i];
		}
		$ora="";
		for($i=72;$i<94;$i++){
			$ora.=$arr[$i];
		}
	

		echo $data." ".$ora;

?>