<?php 
$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST'); //sample host 
$db_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$db_pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$db_name = 'fw42'; //this is the database I created in PhpMyAdmin

$conn = new mysqli($db_host, $db_user, $db_pass,$db_name);
echo "ciao";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	$polo="Polo Scientifico e Tecnologico Fabio Ferrari";
	
	//$sql = "SELECT aula FROM orario WHERE orario.polo='".$polo."' GRUP BY aula SELECT aula FROM orario WHERE orario.polo='".$polo."' AND (orario.orainizio<orario.orafine OR orario.orafine>orario.orainizio) GRUP BY aula ";
	
	$sql = "SELECT aula FROM orario";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["aula"]. "<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close()
	
				
			
        ?>