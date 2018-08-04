<?php
//Set time limit to 0 will give you about 60 minute long request.
set_time_limit(0);

$conn = mysqli_connect("127.0.0.1", "username", "password", "database_name");

header("Content-Type: application/json");

$i = fopen("php://input", "r");
$s = stream_get_contents($i);

while(true){
	$q = mysqli_query($conn, "SELECT * FROM tables");
	$p = array();
	while($r = mysqli_fetch_object($q)){
		$p[] = $r;
	}
	
	if($s !== json_encode($p)){
		echo json_encode($p);
		
		break;
	}
}
?>
