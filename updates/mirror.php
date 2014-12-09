 <?php  
		session_start();
		if(!isset($_SESSION["pos"])){
			$_SESSION["pos"]=0;
		}else

		$arrary= array(10116,10232,10168,10493,10126,10128,10129,10136,10176,10178,10179,10185,10186,10187,10113,10169,10127,10130,10149,10150,10437,10175,10114,10133,10134,
			10153,10117,10131,10151,10152,10155,10156,10157,10158,10438,10159,10164,10165,10166,10167,10233,10115,10170,10112,10123,10124,10507,10137,10138,10139,10140,10234,
			10235,10055,10177);
		echo $_SESSION["text"]." ".$_SESSION["pos"];
		if($_SESSION["pos"]<count($arrary)){	
			$_SESSION["code"]=$arrary[$_SESSION["pos"]];
			$_SESSION["pos"]++;
			header('Location:squares.php');}
		
     /*
		$url='http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/'.$_GET["id"];
		$strin=strip_tags(file_get_contents($url));
		$str2=trim($strin);
	  / for($i=0;$i<count($arr);$i++){
		
		}

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
		echo "Done";
   */
?>