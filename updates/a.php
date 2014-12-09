<?php
ini_set('max_execution_time', 4000);
$iniz=time();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orario";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql = "TRUNCATE orari";

if (mysqli_query($conn, $sql)) {
	echo "Table truncated<br>";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

echo "<br>";

$arrary= array(10116,10232,10168,10493,10126,10128,10129,10136,10176,10178,10179,10185,10186,10187,10113,10169,10127,10130,10149,10150,10437,10175,10114,10133,10134,
10153,10117,10131,10151,10152,10155,10156,10157,10158,10438,10159,10164,10165,10166,10167,10233,10115,10170,10112,10123,10124,10507,10137,10138,10139,10140,10234,
10235,10055,10177);
foreach($arrary as $corso){
	$homepage = file_get_contents('http://webapps.unitn.it/Orari/it/Web/AjaxEventi/c/'.$corso.'-/agendaWeek?_=1417633155537&start=1417388400&end=1417993200');
	$o=0;
	$strlen = strlen( $homepage );
	for( $i = 0; $i < $strlen; $i++ ) {
		if (($homepage[$i]=='u')and($homepage[$i+1]=='r')and($homepage[$i+2]=='l')){
			$url=substr( $homepage, $i+7, 6 );
			$o++;
			$detail = file_get_contents('http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/'.$url);
			
			$strin=strip_tags($detail);
			$str2=trim($strin);
			$str2=str_replace("//$(document).ready(function () {","",$str2);
			$str2=str_replace("$('.dettaglio').usertip();","",$str2);
			$str2=str_replace("//});","",$str2);
			$arr=str_split($str2);
			
			$strlen2 = count($arr);
			
			$p=59;
			while(($p<$strlen2)and!(($arr[$p]<>' ')and($arr[$p+1]<>' ')and($arr[$p+2]=='/')and($arr[$p+3]<>' ')and($arr[$p+4]<>' ')and($arr[$p+5]=='/')and($arr[$p+6]<>' ')and($arr[$p+7]<>' ')and($arr[$p+8]<>' ')and($arr[$p+9]<>' '))){
				$p++;
			}
			$datat=array_slice($arr, $p, 10);
			$data[0]=$datat[6];
			$data[1]=$datat[7];
			$data[2]=$datat[8];
			$data[3]=$datat[9];
			$data[4]='-';
			$data[5]=$datat[3];
			$data[6]=$datat[4];
			$data[7]='-';
			$data[8]=$datat[0];
			$data[9]=$datat[1];
			
			$l=0;
			while(($l<$strlen2)and!(($arr[$l]<>' ')and($arr[$l+1]<>' ')and($arr[$l+2]=='.')and($arr[$l+3]<>' ')and($arr[$l+4]<>' ')and($arr[$l+5]==' ')and($arr[$l+6]=='-')and($arr[$l+7]==' ')and($arr[$l+8]<>' ')and($arr[$l+9]<>' ')and($arr[$l+10]=='.')and($arr[$l+11]<>' ')and($arr[$l+12]<>' '))){
				$l++;
			}
			$orain=array_slice($arr, $l, 5);
			$orafin=array_slice($arr, $l+8, 5);
			$orain[2]=':';
			$orain[5]=':';
			$orain[6]='0';
			$orain[7]='0';
			$orafin[2]=':';
			$orafin[5]=':';
			$orafin[6]='0';
			$orafin[7]='0';
			
			$j=0;
			while(($j<$strlen2)and!(($arr[$j]=='A')and($arr[$j+1]=='u')and($arr[$j+2]=='l')and($arr[$j+3]=='a')and($arr[$j+4]=='/')and($arr[$j+5]=='e')and($arr[$j+6]==':'))){
				$j++;
			}
			$c=$j+17;
			
			$q = 0;
			while(($q<$strlen2)and($arr[$q]<>'(')){
				$q++;
			}
			$x=$q-1;
			$f=$q+1;
			if($x==$strlen2-1) $x=$c;
			$aula=array_slice($arr, $c, $x-$c);
			
			$w=0;
			while(($w<$strlen2)and!(($arr[$w]=='I')and($arr[$w+1]=='n')and($arr[$w+2]=='s')and($arr[$w+3]=='e')and($arr[$w+4]=='g')and($arr[$w+5]=='n')and($arr[$w+6]=='a')and($arr[$w+7]=='m')and($arr[$w+8]=='e')and($arr[$w+9]=='n')and($arr[$w+10]=='t')and($arr[$w+11]=='o'))){
				$w++;
			}
			$d=$w-59;
			if($f==$strlen2+1) $f=$d-1;
			$polo=array_slice($arr, $f, $d-$f-1);
			
			$sql = "INSERT INTO orari (data, orainizio, orafine, aula, polo)
			VALUES ('".implode($data)."', '".implode($orain)."', '".implode($orafin)."', '".implode($aula)."', '".implode($polo)."')";

			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully<br>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
			}
			
			echo "#".$o."<br>&nbsp;&nbsp;&nbsp;&nbsp;".implode($data)."<br>&nbsp;&nbsp;&nbsp;&nbsp;".implode($orain)."<br>&nbsp;&nbsp;&nbsp;&nbsp;".implode($orafin)."<br>&nbsp;&nbsp;&nbsp;&nbsp;".implode($aula)."<br>&nbsp;&nbsp;&nbsp;&nbsp;".implode($polo)."<br><br>";
		}
	}
}
mysqli_close($conn);
echo "Secondi esecuzione: ".(time()-$iniz);
?>