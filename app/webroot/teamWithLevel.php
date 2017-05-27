<?php error_reporting(E_ALL); 
function getConnection(){   
    $host = 'prod-rds.cgydgurehzej.ap-southeast-1.rds.amazonaws.com';
    $user = 'vikrant_prod';
    $port = '3306';
    $sec = 'viky!@#$%^&priya786';
    $db = 'coinigy';
    $conn = new mysqli($host, $user, $sec , $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function printChildQuestions($parentid,$conn,$level=1) {
  $sql="SELECT * FROM users WHERE sponcer = '$parentid' order by side ASC";
  $i = 0;
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $level++;

        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        if (!$row || $row['username'] == $row['sponcer']) break;
        $row['level'] = $level;
        $GLOBALS['users'][]=$row;
        printChildQuestions($row['username'],$conn,$level);
    }
  }
}
$GLOBALS['users'] = array();
$conn =  getConnection();
printChildQuestions($_GET['username'],$conn,$_GET['level']);
echo json_encode($GLOBALS['users']);