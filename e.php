<?php 
$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST'); //sample host 
$db_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$db_pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db_name = 'fw42'; //this is the database I created in PhpMyAdmin

$conn = new mysqli($db_host, $db_user, $db_pass,$db_name);


$iniz=1417388400;
$fin=$iniz+604800;
while((time()<$iniz)OR(time()>$fin)){
	$iniz+=604800;
	$fin+=604800;
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$up[0]="Polo Scientifico e Tecnologico Fabio Ferrari";
	$up[1]="Facolta di Scienze Ed. Potenziamento su campo sportivo, via Sommarive 14  POVO";
	$up[2]="Palazzo Fedrigotti, c.so Bettini 31 ROVERETO";
	$up[3]="Palazzo Istruzione, c.so Bettini 84, ROVERETO";
	$up[4]="Facolta di Economia, via Inama 5";
	$up[5]="Facolta di Lettere e Filosofia, via T. Gar";
	$up[6]="Facolta di Ingegneria, Mesiano";
	$up[7]="Biblioteca di Ingegneria, Mesiano";
	$up[8]="Facolta di Sociologia, via Verdi 26";
	$gup[0]="Povo";
	$gup[1]="Povo";
	$gup[2]="Rovereto";
	$gup[3]="Rovereto";
	$gup[4]="Economia";
	$gup[5]="Lettere";
	$gup[6]="Mesiano";
	$gup[7]="Mesiano";
	$gup[8]="Sociologia";
	
	for($i=0;$i<count($up);$i++){
		$sql="UPDATE orario SET polo='".$gup[$i]."' WHERE polo='".$up[$i]."'";
		$conn->query($sql);
	}
	
$sql="TRUNCATE TABLE freeaula";
$conn->query($sql);
$sql = "SELECT DISTINCT aula,polo FROM orario";
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
			$sql = "INSERT INTO freeaula (aula, polo, orainizio, orafine)
				VALUES ('".$row["aula"]."','".$row["polo"]."',".$iniz.",".$orain[0].")";
			$conn->query($sql);
			for($i=0;$i<count($orain);$i++){
				if($i+1!=count($orain)){
					if($orain[$i+1]!=$orafin[$i]){
						$sql = "INSERT INTO freeaula (aula, polo, orainizio, orafine)
							VALUES ('".$row["aula"]."','".$row["polo"]."',".$orafin[$i].",".$orain[$i+1].")";
						$conn->query($sql);
					}
				}else{
					$sql = "INSERT INTO freeaula (aula, polo, orainizio, orafine)
						VALUES ('".$row["aula"]."','".$row["polo"]."',".$orafin[$i].",".$fin.")";
					$conn->query($sql);
				}
			}
		}
	}
} else {
	echo "0 results";
}
$conn->close()
?>