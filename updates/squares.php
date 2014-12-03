<?php
        $url='http://webapps.unitn.it/Orari/it/Web/AjaxEventi/c/'.$_GET["id"].'-/agendaWeek?_=1417344954081&start=1416783600&end=1417388400';
		$json=json_decode(file_get_contents($url));
		foreach($json->Eventi as $x){
			echo substr($x->url,1)."/";}
   
?>