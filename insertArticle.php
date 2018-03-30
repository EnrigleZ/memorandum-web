<head>
    <title>Insert...</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "dAUHKGpp91Wy";
	$dbname = "mydb";
    
    if (!empty($_POST["content"])) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // 检测连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        } 
        
        $display = 0;
        if ($_POST["human"] == 'on') $display = 1;
        echo $display;
        $addtime = date('y-m-d H:i:s', time()); 
        $ip = $_SERVER["REMOTE_ADDR"];
        
        //str_replace(array("\r\n", "\r", "\n"), "<br>", $_POST["content"]);
        //str_replace("\t")
        
        $_POST["content"] = str_replace("'", "\\'", nl2br($_POST["content"]));
        
        $sql_insert = 
        "INSERT INTO article(
                username, title, content, addtime, ip, display
        )
         VALUES(
                 '{$_POST["username"]}', '{$_POST["title"]}',
                '{$_POST["content"]}', '$addtime', '{$ip}', $display 
        );";
        echo "<pre> ".$sql_insert . "</pre>";
        $conn->query($sql_insert);
        echo $_POST["content"];

    }
    else {
        echo "你他妈玩蛋呢？"."<br>";
    }
?>