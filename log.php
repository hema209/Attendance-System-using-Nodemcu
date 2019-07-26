<?php 
if(isset($_GET['cardid'])){
	switch ($_GET['cardid']) {
		case '$_GET["cardid"]':
		insertRfIdLog();
		break;

		default:

		break;
	}
}


function insertRfIdLog() {
    include 'connect.php';
    $cardid = $_POST['cardid'];
    $time = time();
	
    $stmt = $conn->prepare("INSERT INTO `table`(`cardid`, `logdate`) VALUES (:card, :dt)");
    $stmt->bindParam(":card", $cardid);
    $stmt->bindParam(":dt", $time);
	$stmt->execute();
	
	echo "success";
}



?>
