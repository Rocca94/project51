<?php

$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST'); //sample host 
$db_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$db_pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db_name = 'fw42'; //this is the database I created in PhpMyAdmin

$conn = new mysqli($db_host, $db_user, $db_pass,$db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$polo=$_GET["polo"];
	$giorno=$_GET["day"];
	$orain=$_GET["orai"];
	$orafin=$_GET["oraf"];
	
	$sql = "SELECT * FROM freeaula WHERE polo='".$polo."' AND giorno='".$giorno."' AND (orainizio<=".$orai." AND orafine>=".$oraf.")";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$sql = "SELECT DISTINCT orainizio,orafine FROM orario WHERE orario.aula='".$row["aula"]."' AND orario.polo='".$row["polo"]."' ORDER BY orario.orainizio";
			$aulas = $conn->query($sql);
			if ($aulas->num_rows > 0) {
				$i=0;
				while($col = $aulas->fetch_assoc()) {
					$orain[$i]=$col["orainizio"];
					$orafin[$i]=$col["orafine"];
					$i++;
				}
				for($i=0;$i<count($orain);$i++){
					if(($i+1!=count($orain)) AND ($orain[$i+1]!=$orafin[$i])){
						$sql = "INSERT INTO freeaula (aula, polo, orainizio, orafine)
						VALUES ('".$row["aula"]."','".$row["polo"]."',".$orafin[$i].",".$orain[$i+1].")";
						$conn->query($sql);
					}
				}
			}
			//echo "Aula:".$row["aula"]."<br>";
		}
	} else {
		echo "0 results";
	}
	
	$conn->close();		
?>