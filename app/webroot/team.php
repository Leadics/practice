<?php error_reporting(E_ALL); 
function getConnection(){   
    $host = '127.0.0.1';
    $user = 'root';
    $port = '3306';
    $sec = '';
    $db = 'coinigy';
    $conn = new mysqli($host, $user, $sec , $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function printChildQuestions($parentid,$conn) {
  $sql="SELECT * FROM users WHERE sponcer = '$parentid' order by side ASC";
  $i = 0;
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
		    if (!$row || $row['username'] == $row['sponcer']) break;
		    
		    $GLOBALS['users'][]=$row;
		    printChildQuestions($row['username'],$conn);
	  }
  }
}
$GLOBALS['users'] = array();
$conn =  getConnection();
printChildQuestions($_GET['username'],$conn);
echo json_encode($GLOBALS['users']);