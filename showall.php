    <head>
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

<?php
	$servername = "localhost";
	$username = "memorandum";
	$password = "fred1111";
	$dbname = "mydb";

	// 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql_select = "select id, username, status, msg, addtime from comment";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
		// 输出数据
		while($row = $result->fetch_assoc()) {
            echo $row["id"]. "&nbsp-&nbsp". $row["username"]. "&nbsp". 
                $row["status"]. "<br>". $row["msg"]. "<br>time:". $row["addtime"], "<br><br>";
		}
	} else {
		echo "0 结果";
	}
?>