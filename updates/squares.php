 <?php  
		session_start();
		ini_set('max_execution_time',1000);
		
	/*	$servername = "mysql.hostinger.it";
		$username = "u644967097_lelle";
		$password = "Q4SA6j7psp";
		$db="u644967097_orari";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$db);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			
		$sql = "SELECT idf FROM facolta";
		$result = $conn->query($sql);*/

	
			// output data of each row
	
				//Prendo codice quadrato colorato
				$url='http://webapps.unitn.it/Orari/it/Web/AjaxEventi/c/'.$_SESSION["code"].'-/agendaWeek?_=1417344954081&start=1416783600&end=1417388400';
				/*$url='http://webapps.unitn.it/Orari/it/Web/AjaxEventi/c/10116-/agendaWeek?_=1417344954081&start=1416783600&end=1417388400';*/
				$json=json_decode(file_get_contents($url));
				foreach($json->Eventi as $x){
					//ora inizio e fine
					$oinizio=$x->start;
					$ofine=$x->end;
					//-------------
					$url='http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/'.substr($x->url,1);
					$text=strip_tags(file_get_contents($url));
					$text=explode(':',$text);
					$pos=count($text)-1;
					//Trova aula
					$tmp=explode('(',$text[$pos]);
					$aula=$tmp[0];
					//------------
					$tmp=preg_split("/[\(,)]+/",$text[$pos]);
					$polo=$tmp[1];
					echo $oinizio." -- ".$ofine." -- ";
					echo $aula."  ".$polo."<br>";
				}
		
		$_SESSION["text"]=$aula;
		header('Location:mirror.php');
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