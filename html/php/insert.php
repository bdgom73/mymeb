<html>
<head>
<?php
    //데이터 베이스 연결하기
    include "db_info.php";

    $id = $_GET['id'];
    $name = $_POST['name'];
	$email = $_POST['email'];
    $pass = $_POST['password'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];

    $query = "INSERT INTO content
    (id, name, email, password, title, content, wdate, ip, view)
    VALUES (null, '$name', '$email', '$pass', '$title',
    '$content', now(), '$REMOTE_ADDR', 0)";
	$result=mysqli_query($conn,$query) or die (mysqli_error($conn));

    //데이터베이스와의 연결 종료
    mysqli_close($conn);

    // 새 글 쓰기인 경우 리스트로..
    echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
    //1초후에 list.php로 이동함.
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div class="content">정상적으로 저장되었습니다.</div>
<Style>
    .content{
        font-size:30px;
        text-align:center;
        color:white;
        
    }
    body{
        background-color:#2d2d2d;
    }
</body>
</html>
