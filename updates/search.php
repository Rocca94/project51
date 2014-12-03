<?php
$servername = "mysql.hostinger.it";
$username = "u644967097_lelle";
$password = "Q4SA6j7psp";
$db="u644967097_orari";
// Create connection
$conn = new mysqli($servername,$username,$password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT idf FROM facolta";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
		if($i<5){
		$i++;
        $url='http://webapps.unitn.it/Orari/it/Web/AjaxEventi/c/'.$row["idf"].'-/agendaWeek?_=1417344954081&start=1416783600&end=1417388400';
		$json=json_decode(file_get_contents($url));
		echo $json->Eventi[1]->url;}
    }
} 
//echo "Connected successfully";
//for($i=486656;$i<486700;$i++){
	//$url='http://webapps.unitn.it/Orari/it/Web/DettaglioImpegno/486656';
	


//}
echo $body;
	
?>